import React from 'react';
// import Button from 'react-bootstrap/Button';
// import Card from 'react-bootstrap/Card';
import { Link } from 'react-router-dom';
import './VolunteerCard.css';

class VolunteerCard extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      open: false
    };
  }

  render() {
    const { open } = this.state;
    const { volunteer } = this.props;
    return (
      <Link to={`/profile/${volunteer.id}`} className="Cardd-button">
        <div className="cardd">
          <div
            className="cardd-header"
            style={{
              backgroundImage:
                'url(https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/robert.jpg)'
            }}
          >
            <div className="cardd-header-slanted-edge">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 200">
                <path className="polygon" d="M-20,200,1000,0V200Z" />
              </svg>
            </div>
          </div>

          <div className="cardd-body">
            <h2 className="name">
              {`${volunteer.firstname} ${volunteer.lastname}`}
            </h2>
            <h4 className="job-title">
              {volunteer.jobs.map(job => `${job.jobType.jobType}`).join(', ')}
            </h4>
            <div className="bio">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Dignissimos, aperiam.
            </div>
          </div>
        </div>
      </Link>
    );
  }
}

export default VolunteerCard;
