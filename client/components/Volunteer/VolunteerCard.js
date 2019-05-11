import React from 'react';
import Button from 'react-bootstrap/Button';
import Card from 'react-bootstrap/Card';
import { Link } from 'react-router-dom';

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
      <div className="u-topBottomMargin">
        <Card className="Card">
          <Card.Body className="text-center">
            <Card.Img
              className="Card Card-avatar rounded-circle"
              src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/robert.jpg"
            />
            <Card.Title variant="h4" className="Card Card-fullName">
              {`${volunteer.firstname} ${volunteer.lastname}`}
            </Card.Title>
            <Card.Subtitle className="card-subtitle mb-2 text-muted">
              Category
            </Card.Subtitle>
            <Card.Text style={{ textTransform: 'capitalize' }}>
              {volunteer.jobs.map(job => `${job.jobType.jobType} `)}
            </Card.Text>
            <Card.Subtitle className="card-subtitle mb-2 text-muted">
              Languages
            </Card.Subtitle>
            <Card.Text>English</Card.Text>
            <div className="button-wrapper">
              <Link
                className="Card-button"
                to={`/profile/${volunteer.id}`} //Iskelt
              >
                See profile
              </Link>
              <Button className="Card-button btn btn-info">Choose</Button>
            </div>
          </Card.Body>
        </Card>
      </div>
    );
  }
}

export default VolunteerCard;
