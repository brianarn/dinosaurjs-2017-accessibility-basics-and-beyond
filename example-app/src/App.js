import React, { Component } from 'react';
import {
  BrowserRouter as Router,
  Route,
  NavLink
} from 'react-router-dom';

import Home from './components/Home';
import About from './components/About';

import 'tachyons/css/tachyons.css';
import './App.css';

class App extends Component {
  render() {
    return (
      <Router>
        <div className="App">
          <header>
            <nav className="pa3 mw8 center">
              <NavLink to="/" exact className="link black b f6 mr4">Accessibility Basics</NavLink>
              <NavLink to="/about" className="link gray f6">About</NavLink>
            </nav>
          </header>

          <div className="container mw8 center">
            <Route exact path="/" component={Home} />
            <Route path="/about" component={About} />
          </div>
        </div>
      </Router>
    );
  }
}

export default App;
