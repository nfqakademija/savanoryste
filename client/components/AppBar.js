import React from 'react';
import Navbar from 'react-bootstrap/Navbar';
import Nav from 'react-bootstrap/Nav';
import { Link } from 'react-router-dom';
import './App.css';

const AppBar = () => (
  <Navbar expand="sm" className="Navbar">
    <Link to="/" className="Navbar-brand">
      Volunteers
    </Link>
    <Navbar.Toggle aria-controls="basic-navbar-nav" />
    <Navbar.Collapse id="basic-navbar-nav">
      <Nav className="mr-auto">
        <Link to="/event" className="Navbar-link">
          Event
        </Link>
        <Link to="/organisation" className="Navbar-link">
          Organisation
        </Link>

        <a href="/login" className="Navbar-link">
          Login
        </a>

        <a href="/register" className="Navbar-link">
          Register
        </a>
        <a href="/logout" className="Navbar-link">
          Logout
        </a>
      </Nav>
    </Navbar.Collapse>
  </Navbar>
);

export default AppBar;
