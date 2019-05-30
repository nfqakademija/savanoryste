import React from 'react';
import './EventCard.css';
import { Link } from 'react-router-dom';

const EventCard = props => (
  // <Link to={`/event/${props.event.id}`} className="Cardd-button">
  <div className="event-card">
    <div>
      <img src="https://images.unsplash.com/photo-1498279898147-67f541d32b6a?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=af428042e69ac5152855548d8b4f7989&auto=format&fit=crop&w=667&q=80" />
    </div>
    <div className="event-info-container">
      <h2 className="namee">{props.event.title.substr(0, 17) + '..'}</h2>
      <h4 className="date">August 28 | 8am - 3pm</h4>
      <div>
        <p className="desc">{props.event.description.substr(0, 70) + '...'}</p>
      </div>
      <div>
        <div className="date-ribbon">
          <h2>{props.event.startDate.substr(5, 2)}</h2>
          <h1>{props.event.startDate.substr(8, 2)}</h1>
        </div>
      </div>
    </div>
  </div>
  // </Link>
);

export default EventCard;
