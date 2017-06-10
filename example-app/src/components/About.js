import React from 'react';
import { Link } from 'react-router-dom';

function About() {
  return (
    <div className="Home">
      <h1>About the demos</h1>
      <p>This is a small collection of demos for the DinosaurJS 2017 accessibility workshop. They're all authored by Brian Sinclair and are based on his experiences in developing with accessibility in mind.</p>
      <Link to="/">Back to the list</Link>
    </div>
  );
}

export default About;
