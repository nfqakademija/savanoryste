import React from 'react';
import Navbar from 'react-bootstrap/Navbar';
import Nav from 'react-bootstrap/Nav';
import { Link } from 'react-router-dom';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import './App.css';

const AppBar = () => (
  <Navbar expand="sm" className="Navbar">
    <Link to="/" className="Navbar-brand">
      Savanorystė
    </Link>
    <div>
      <a href="/login" className="Navbar-link">
        Prisijungti
      </a>

      <a href="/register" className="Navbar-link">
        Registruotis
      </a>
    </div>
  </Navbar>
);

export default AppBar;
