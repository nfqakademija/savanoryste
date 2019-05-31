import React from 'react';
import Button from 'react-bootstrap/Button';
import Card from 'react-bootstrap/Card';
import Cookies from 'js-cookie';
import { getVolunteerUser } from '../../actions/usersActions';
import { connect } from 'react-redux';

class VolunteerProfileCard extends React.Component {
  constructor(props) {
    super(props);

    if (Cookies.get('userId') != undefined) {
      props.getVolunteerUser(Cookies.get('userId'));
    }
  }

  render() {
    const { volunteer, isEditing, volunteerUser } = this.props;
    return (
      <Card>
        <Card.Img
          src={
            'http://savanoryste.projektai.nfqakademija.lt/uploads/volunteer/' +
            volunteer.ProfilePic
          }
        />
        <Card.ImgOverlay>
          <Card.Body className="Card-profile-wrapper">
            <Card.Title className="Card-profile-name">
              {volunteer.firstname + ' ' + volunteer.lastname}
            </Card.Title>
            <div className="Card-profile-buttons">
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
                className="Card-button Card-profile-button btn btn-info"
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
