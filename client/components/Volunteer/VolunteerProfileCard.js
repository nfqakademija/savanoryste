import React from 'react';
import Button from 'react-bootstrap/Button';
import Card from 'react-bootstrap/Card';

class VolunteerProfileCard extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      open: false
    };
  }

  render() {
    const { open } = this.state;
    const { volunteer, isEditing } = this.props;

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
                className="Card-profile-button btn btn-info"
                onClick={isEditing}
                block
              >
                Edit
              </Button>

              <Button
                className="Card-button-transparent Card-profile-button btn btn-info"
                block
                href="/"
              >
                Back
              </Button>
            </div>
          </Card.Body>
        </Card.ImgOverlay>
      </Card>
    );
  }
}

export default VolunteerProfileCard;
