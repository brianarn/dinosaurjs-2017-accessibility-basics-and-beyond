import React, { Component } from 'react';
import 'tachyons/css/tachyons.css';
import './App.css';

class App extends Component {
  render() {
    return (
      <div className="App">
        <header>
          <nav className="pa2">
            <a className="link f6" href="/">Home</a>
          </nav>
          <h1 className="tc">Accessibility Basics</h1>
        </header>
      </div>
    );
  }
}

export default App;
