import React from 'react';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Container from 'react-bootstrap/Container';
import './EventCard.css';

class EventCard extends React.Component {
  render() {
    return (
      <div className="event-card">
        <div>
          <img src="https://images.unsplash.com/photo-1498279898147-67f541d32b6a?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=af428042e69ac5152855548d8b4f7989&auto=format&fit=crop&w=667&q=80" />
        </div>
        <div className="event-info-container">
          <h1 className="namee">Scuba Merit Badge</h1>
          <h3 className="date">August 28 | 8am - 3pm</h3>
          <div>
            <p className="desc">
              Earn your scuba diving merit badge. Pre-req: Requirement 1a, 2b,
              4ab
            </p>
            <div className="location">503 Harbor Blvd, Destin, FL</div>
          </div>
          <div>
            <div className="date-ribbon">
              <h2>Aug</h2>
              <h1>28</h1>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default EventCard;
