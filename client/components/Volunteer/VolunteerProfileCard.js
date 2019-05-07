import React from 'react';
import Button from 'react-bootstrap/Button';
import Card from 'react-bootstrap/Card';
import Badge from 'react-bootstrap/Badge';
import { Link } from 'react-router-dom';

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
      <Card>
        <Card.Img src="https://images.pexels.com/photos/532220/pexels-photo-532220.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" />
        <Card.ImgOverlay>
          <Card.Body className="Card-profile-wrapper">
            <Card.Title className="Card-profile-name">
              {volunteer.firstname + ' ' + volunteer.lastname}
            </Card.Title>
            <div className="Card-profile-buttons">
              <Button className="Card-profile-button btn btn-info" block>
                {`Choose ${volunteer.firstname + ' ' + volunteer.lastname}`}
              </Button>
              <Button
                className="Card-button-transparent Card-profile-button btn btn-info"
                block
                href="/"
              >
                Cancel
              </Button>
            </div>
            {/* <div className="profile-card">
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
            </div> */}
          </Card.Body>
        </Card.ImgOverlay>
      </Card>
    );
  }
}

export default VolunteerProfileCard;
