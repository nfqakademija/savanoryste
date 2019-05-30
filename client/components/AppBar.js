import React from 'react';
import Navbar from 'react-bootstrap/Navbar';
import Nav from 'react-bootstrap/Nav';
import { Link } from 'react-router-dom';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import './App.css';
import Cookies from 'js-cookie';

const AppBar = props => {
  return (
    <Navbar expand="sm" className="Navbar">
      <Link to="/" className="Navbar-brand">
        Savanorystė
      </Link>

      {Cookies.get('userId') === undefined ? (
        <div>
          <a href="/login" className="Navbar-link">
            Prisijungti
          </a>

          <a href="/register" className="Navbar-link">
            Registruotis
          </a>
        </div>
      ) : (
        <div>
          <a href="/logout" className="Navbar-link">
            Atsijungti
          </a>
        </div>
      )}
    </Navbar>
  );
};

export default AppBar;
