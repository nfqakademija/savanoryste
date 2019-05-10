import React from 'react';
import Navbar from 'react-bootstrap/Navbar';
import Nav from 'react-bootstrap/Nav';
import { Link } from 'react-router-dom';

const AppBar = () => (
  <Navbar bg="light" expand="lg">
    <Navbar.Brand href="#home">Savanorystė</Navbar.Brand>
    <Navbar.Toggle aria-controls="basic-navbar-nav" />
    <Navbar.Collapse id="basic-navbar-nav">
      <Nav className="mr-auto">
        <Nav.Link>
          <Link to="/">Home</Link>
        </Nav.Link>
        <Nav.Link>
          <Link to="/profile">Profile</Link>
        </Nav.Link>
      </Nav>
    </Navbar.Collapse>
  </Navbar>
);

export default AppBar;
