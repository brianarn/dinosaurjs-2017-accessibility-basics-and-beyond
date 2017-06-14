var reportTable = function ()
{

  /**
   * bool of DOM compatability
   * @private
   */
  var _dom = document.getElementById && document.createElement

  /**
   * Table element
   * @private
   */
  var _table;

  /**
   * default option container
   * @private
   */
  var _defaultOptions = {
    rowControles: true
    ,  rowMouseHandler: true
    ,  textCollapse: true
    ,  textCollapseDefault: true
    ,  textCollapseClass: ['expand', 'collapse']
    ,  textCollapseText: ['Show full description', 'Hide full description']
    ,  openButtonSrc: {  principle : '../../img/minus_icon.png'
    ,  guideline: '../../img/minus_guideline_icon.png'
    ,  criterion: '../../img/minus_criterion_icon.png' }
    ,  openButtonAlt: 'Opened'
    ,  closeButtonSrc: {  principle : '../../img/plus_icon.png'
    ,  guideline: '../../img/plus_guideline_icon.png'
    ,  criterion: '../../img/plus_criterion_icon.png' }
    ,  closeButtonAlt: 'Closed'
    ,  reportLevelDefault: true
    ,  reportLevels: ['principle', 'guideline', 'criterion', 'evaluation']
    ,  foldAllButtons: true
  }

  /**
   * If no DOM support, return empty object;
   */
  if (!_dom) {
    reportTable =  function () {};
  }

  /**
   * Initiate the table
   * @constructor
   * @public
   */
  this.init = function (options) {
    var options = typeof options == 'undefined'
      ? _defaultOptions : options;
    
    // Attach controllers to the table's components
    _init.setControlers(options);
    // add buttons to fold / unfold the rows
    if (options.rowControles) {
      _init.addRowControles(options);
    }
    // Collapse long text parts of the table
    if (options.textCollapse) {
      _init.addTextCollapse(options);
    }
    // Add fold/unfold all rows buttons at the top of the table
    if (options.foldAllButtons) {
      _init.addFoldAllButtons(options);
    }
    // This function must always come last as it handles propagation of
    // ancher element onclick events
    if (options.rowMouseHandler) {
      _init.addRowMouseHandler(options);
    }
  }

  /**
   * Set the report table element
   *
   * @param string|DOMElement  tableName
   * @public
   */
  this.setTable = function (t) {
    if (typeof t == 'string') {
      var t = document.getElementById(t);
    }

    if (t.nodeType != 1 || t.nodeName.toLowerCase() != 'table') {
      throw "Table element could not be found.";
    }
    // Let CSS know script is running
    t.className += ' script_on';
    _table = t;
  }

  /**
   * Get the report table element
   * @return DOMElement
   * @public
   */
  this.getTable = function () {
    return _table;
  }

  /**
   * Get all rows of the report table
   * @return NodeList
   * @private
   */
  function _getAllRows() {
    return _table.getElementsByTagName('tr');
  }

  /**
   * Unfold all rows simultaniously
   * @private
   */
  function _unfoldAll() {
    var rows = _getAllRows();
    var lvls = _defaultOptions.reportLevels.concat();
    lvls.pop();
    var lvlReg = new RegExp(lvls.join('|'));

    for (var i=0; i < rows.length; i++) {
      // skip if the row can't be unfolded
      if (!rows[i].className.match(lvlReg) ) {
        continue;
      }
      // Unfold if it's not already in that state
      if (!rows[i].state) {
        rows[i].changeFold();
      }
    }
  }

  /**
   * Fold all rows simultaniously
   * @private
   */
  function _foldAll() {
    var rows = _getAllRows();
    var lvls = _defaultOptions.reportLevels.concat();
    lvls.pop();
    var lvlReg = new RegExp(lvls.join('|'));

    for (var i=0; i < rows.length; i++) {
      // skip if the row can't be folded
      if (!rows[i].className.match(lvlReg) ) {
        continue;
      }
      // Fold if it's not already in that state
      if (rows[i].state) {
        rows[i].changeFold();
      }
    }
  }

  /**
   * Container for functions used in object construction
   * @private
   */
  var _init = {
    /**
     * Set handlers used by functions throughout the script to deal with relationships inside the table
     * @param options
     */
    setControlers : function ( options ) {
      var prev;
      var rows = _getAllRows();
      var lvls = options.reportLevels.concat();
      var lvlReg = new RegExp(lvls.join('|'));
      // loop through all report rows
      for (var i=0; i < rows.length; i++) {
        var row = rows[i];
        // Skip any row that does not mach a level
        if (!row.className.match(lvlReg) ) {
          continue;
        }
        // apply properties and methodes to a row
        row.changeFold  = _handlers.changeRowFold;
        row.hide    = _handlers.hideRow;
        row.show    = _handlers.showRow;
        row.state    = true;
        row.prev    = prev;
        row.next    = rows[i+1];

        // set property 'reportLevel' to a row
        for (var j=0; j < options.reportLevels.length; j++) {
          var classReg = RegExp(options.reportLevels[j]);
          if (row.className.match( classReg )) {
            row.reportLevel = options.reportLevels[j];
            break;
          }
        }
        // define the previous row (for next cicle)
        var prev = row;
      }
    }

    /**
     * Add an outer right column with ancher elements to controle fold/unfold behavior
     * @param options
     */
  ,  addRowControles : function ( options ) {
      var rows = _getAllRows();
      // Levels that need row controles (pop off the last one as it can't fold anything)
      var lvls = options.reportLevels.concat();
      lvls.pop();
      lvls = lvls.join('|');

      for (var i=0; i < rows.length; i++) {
        // expand every row with a single cell
        var row = rows[i];
        var cell = row.cells[0];

        if (lvls.indexOf(row.reportLevel) == -1) {
          // skip if report level not part of the list of foldable rows
          continue;
        } else if (typeof row.next == 'undefined') {
          // skip if no next row
          continue;
        } else if (lvls.indexOf(row.next.reportLevel) == -1) {
          // go on if the next element is of the lowest level
        } else if (lvls.indexOf(row.reportLevel) >= lvls.indexOf(row.next.reportLevel) ) {
          // Skip if the next element is a higher level
          continue;
        }

        // create elements
        var aElm  = document.createElement('a');
        var imgElm  = document.createElement('img');

        // set attributes
        aElm.href   = '#';
        aElm.onclick = function () {
          this.parentNode.parentNode.changeFold();
          return false;
        }
        imgElm.alt   = options.openButtonAlt
        imgElm.src   = options.openButtonSrc[ row.reportLevel ]

        // append
        cell.appendChild(aElm);
        aElm.appendChild(imgElm);
        // Store the link under a foldButton variable for controller access
        row.foldButton = aElm;

        /**
         * Store the original controller under a new name
         * and set a new one that will trigger the old one
         */
        row.changeAncheredFold = row.changeFold;
        row.changeFold = _handlers.changeAncherFold;

        if (( options.reportLevelDefault )
        &&  ( row.reportLevel != options.reportLevels[0] ))
        {
          aElm.onclick();
        }
      }
    }

    /**
     * Add collaps/expand function to longer text in the document
     * @param options
     */
  ,  addTextCollapse : function (options) {
      var divElms = _table.getElementsByTagName('div');
      var classReg  = new RegExp( options.textCollapseClass[0] );

      for (var i=0; i < divElms.length; i++) {
        // Skip any div that doesn't match the class
        if (!divElms[i].className.match( classReg )) continue;
        
        var aElm  = document.createElement('a');
        var txtElm  = document.createTextNode(
            options.textCollapseText[0]
          );

        aElm.href = '#';
        aElm.onclick = _handlers.changeExpand

        aElm.appendChild(txtElm);
        divElms[i].parentNode.insertBefore(aElm, divElms[i]);
        if (options.textCollapseDefault) {
          aElm.onclick();
        }
      }
    }

    /**
     * Add mouse controle by making the row fold / unfold with a click
     * @param options
     */
  ,  addRowMouseHandler : function (options) {
      // Levels that need row controles (pop off the last one as it can't fold anything)
      var lvls = options.reportLevels.concat();
      lvls.pop();
      var lvlReg = new RegExp(lvls.join('|'));
      var rows = _getAllRows();

      for (var i=0; i < rows.length; i++) {
        if (!rows[i].className.match(lvlReg) ) {
          continue;
        }

        rows[i].onclick = function () {
          this.changeFold()
        };
        var aElms = rows[i].getElementsByTagName('a');
        for (var j=0; j < aElms.length; j++) {
          aElms[j].propagatatedOnclick = aElms[j].onclick;
          aElms[j].onclick = _handlers.mouseHandlerPropagation
        }
      }
    }

    /**
     * Add 2 buttons to collapse ane expand all rows at once
     * @param options
     */
  ,  addFoldAllButtons : function (options) {
      var b = false;
      do {
        var expandElm  = document.createElement('a');
        var collapseElm  = document.createElement('a');
        var container  = document.createElement('div');

        expandElm.appendChild(
            document.createTextNode( 'Expand all rows' )
          );
        collapseElm.appendChild(
            document.createTextNode( 'Collapse all rows' )
          );
        container.appendChild( expandElm );
        container.appendChild( 
            document.createTextNode( ' ' )
          );
        container.appendChild( collapseElm );
        container.className = 'reportControls';

        expandElm.href   = '#';
        collapseElm.href = '#';

        expandElm.onclick = function () {
          _unfoldAll();
          return false;
        }
        collapseElm.onclick = function () {
          _foldAll();
          return false;
        }

        // Have to loop twice as cloneNode wouldn't take the onclick
        if (!b) {
          _table.parentNode.insertBefore(container, _table);
          b = true;
        } else {
          _table.parentNode.insertBefore(container, _table.nextSibling);
          break;
        }
      } while (true);
    }
  }

  /**
   * Container for event handlers
   */
  var _handlers = {
    /**
     * Change the folding of a row
     * @var this  the row that is changed
     */
    changeRowFold : function () {
      // find all levels that this row should hide|show
      var lvls = _defaultOptions.reportLevels.concat().reverse();
      for (var i=lvls.length; i > 0 ; i--) {
        if (this.reportLevel == lvls.pop() ) break;
      }
      if (!lvls.length) return;

      var lvlReg = new RegExp(lvls.join('|'));

      // loop stops at next occurance of it's level, or the last sibling
      var sib = this.nextSibling;
      while (sib != null) {
        // skip if sibling isn't an element
        if (sib.nodeType == 1 && typeof sib.reportLevel != 'undefined') {
          // stop if the next element of the same level is reached
          if (!sib.reportLevel.match( lvlReg )) break;

          // hide or show the sibling, depending on the current state
          this.state ? sib.hide() : sib.show();
        }
        // move to the next sibling
        var sib = sib.nextSibling;
      }
      // reverse current state
      this.state = !this.state;
    }

    /**
     * Hide a row by adding a 'hidden' to it's className
     *
     * Any row can be hidden multiple times ie. principles hides all
     * criterion and guidelines, but a guideline also hides a criterion
     * so the criterion has been hidden twice and will have a clase
     * ' hidden hidden' to it.
     * @var this  the row that is changed
     */
  ,  hideRow : function () {
      this.className += ' hidden';
    }
    /**
     * Show a row by removing a 'hidden' from it's className
     * @var this  the row that is changed
     */
  ,  showRow : function () {
      this.className = this.className.replace(' hidden', '');
    }

    /**
     * Change the fold of a row through the onclick on an ancher element
     * @var this  ancher element RowControle
     * @param  Event object
     * @return  false
     */
  ,  changeAncherFold : function () {
      var img = this.foldButton.getElementsByTagName('img')[0]
      this.changeAncheredFold();

      if (this.state) {
        img.src = _defaultOptions.openButtonSrc[this.reportLevel];
        img.alt = _defaultOptions.openButtonAlt;

      } else {
        img.src = _defaultOptions.closeButtonSrc[this.reportLevel];
        img.alt = _defaultOptions.closeButtonAlt;
      }
      return false;
    }

    /**
     * Expand or collapse an extensive guideline text through onclick
     * @param  Event object
     * @return  false
     */
  ,  changeExpand : function () {
      var lvls = _defaultOptions.textCollapseClass;
      var lvlReg = RegExp(lvls[0]);
      // identify the current state of the DIV element
      var state = this.nextSibling.className.match(lvlReg) ? 0 : 1;
      // set the classname oppose to the current state
      this.nextSibling.className = state ? lvls[0] : lvls[1];
      // create a new text
      var txt = document.createTextNode( _defaultOptions.textCollapseText[state] );
      this.removeChild(this.firstChild);
      this.appendChild(txt);
      return false;
    }

    /**
     * Use onclick on a row and propage the effect through the a element
     * @param  Event object
     * @return  false
     */
  ,  mouseHandlerPropagation : function (e) {
      if (!e) var e = window.event;
      if (e) {
        e.cancelBubble = true;
        if (e.stopPropagation) e.stopPropagation();
      }
      this.propagatatedOnclick();
      return false;
    }
  }
};