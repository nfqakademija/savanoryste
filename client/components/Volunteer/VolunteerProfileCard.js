import React from 'react';
import Button from 'react-bootstrap/Button';
import Card from 'react-bootstrap/Card';
import Cookies from 'js-cookie';
import { getVolunteerUser } from '../../actions/usersActions';
import { connect } from 'react-redux';

class VolunteerProfileCard extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      open: false
    };

    if (Cookies.get('userId') != undefined) {
      props.getVolunteerUser(Cookies.get('userId'));
      console.log(Cookies.get('userId'));
    }
  }

  render() {
    const { open } = this.state;
    const { volunteer, isEditing, volunteerUser } = this.props;
    console.log(volunteerUser);
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
              {volunteerUser.id === volunteer.id ? (
                <Button
                  className="Card-profile-button btn btn-info"
                  onClick={isEditing}
                  block
                >
                  Redaguoti
                </Button>
              ) : null}

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

const mapStateToProps = state => ({
  volunteerUser: state.users.volunteerUser
});

const mapDispatchToProps = dispatch => ({
  getVolunteerUser: id => dispatch(getVolunteerUser(id))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(VolunteerProfileCard);
