import React from 'react';
import Button from 'react-bootstrap/Button';
import Card from 'react-bootstrap/Card';
import Badge from 'react-bootstrap/Badge';

class VolunteerProfileCard extends React.Component {
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
      <Card className="volunteer-card">
        <Card.Body className="text-center">
          <Card.Img
            className="avatar rounded-circle"
            src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/robert.jpg"
          />
          <Card.Title variant="h4" className="card-title">
            {volunteer.firstname + ' ' + volunteer.lastname}
          </Card.Title>

          <Button
            onClick={() => this.setState({ open: !open })}
            aria-controls="example-collapse-text"
            aria-expanded={open}
            className="btn btn-info"
          >
            Book now
          </Button>

          <div className="profile-card">
            <h5>
              Events attended{' '}
              <Badge variant="secondary">{volunteer.events.length}</Badge>
            </h5>
            <h5>
              Rating <Badge variant="secondary">4.5/5</Badge>
            </h5>
            <h5>
              Reviews{' '}
              <Badge variant="secondary">{volunteer.reviews.length}</Badge>
            </h5>
          </div>
        </Card.Body>
      </Card>
    );
  }
}

export default VolunteerProfileCard;
