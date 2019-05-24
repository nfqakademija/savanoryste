import React from 'react';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import Card from 'react-bootstrap/Card';
import Image from 'react-bootstrap/Image';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faQuoteLeft, faStar } from '@fortawesome/free-solid-svg-icons';
import './VolunteerReviewCard.css';

const VolunteerReviewCard = () => (
  <figure className="snip1157">
    <blockquote>
      Calvin: You know sometimes when I'm talking, my words can't keep up with
      my thoughts... I wonder why we think faster than we speak.
    </blockquote>

    <div className="author">
      <h5>
        Pelican Steve <span> LIttleSnippets.net</span>
      </h5>
    </div>
  </figure>
);

export default VolunteerReviewCard;
