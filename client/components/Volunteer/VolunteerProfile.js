import React from 'react';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import VolunteerProfileEdit from './VolunteerProfileEdit';
import VolunteerProfileCard from './VolunteerProfileCard';
import VolunteerProfileInfo from './VolunteerProfileInfo';
import VolunteerReviewCard from './VolunteerReviewCard';
import { connect } from 'react-redux';
import Cookies from 'js-cookie';
import { getVolunteer } from '../../actions/volunteersActions';
import { getVolunteerUser } from '../../actions/usersActions';

class VolunteerProfile extends React.Component {
  constructor(props) {
    super(props);
    props.getVolunteer(props.match.params.id);
    if (Cookies.get('userdId') != undefined) {
      props.getVolunteerUser(Cookies.get('userId'));
    }
    this.state = {
      isEditing: false
    };
  }

  onEditClick = () => {
    this.setState({ isEditing: !this.state.isEditing });
  };

  render() {
    const { volunteer, loading } = this.props;
    const { isEditing } = this.state;

    return Object.entries(volunteer).length === 0 &&
      volunteer.constructor === Object ? (
      <h1>Kraunama...</h1>
    ) : (
      <Container style={{ margin: 'auto' }}>
        <Row>
          <Col xs={11} sm={12} md={5} lg={4}>
            <VolunteerProfileCard
              volunteer={volunteer}
              isEditing={this.onEditClick}
            />
          </Col>
          <Col xs={12} sm={12} md={7}>
            {!isEditing ? (
              <VolunteerProfileInfo volunteer={volunteer} />
            ) : (
              <VolunteerProfileEdit volunteer={volunteer} />
            )}
          </Col>
        </Row>
        <Row style={{ marginTop: '10px' }}>
          <Col lg={4}>
            <h3>Naujausias atsiliepimas</h3>
            <VolunteerReviewCard />
          </Col>
        </Row>
      </Container>
    );
  }
}

const mapStateToProps = state => ({
  volunteer: state.volunteers.volunteer,
  loading: state.volunteers.loading,
  events: state.events.events
});

const mapDispatchToProps = dispatch => ({
  getVolunteer: id => dispatch(getVolunteer(id)),
  getVolunteerUser: id => dispatch(getVolunteerUser(id))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(VolunteerProfile);
