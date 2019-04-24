import React from 'react';
import { connect } from 'react-redux';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import VolunteerCard from './VolunteerCard';
import { getVolunteerList } from '../../actions/volunteersActions';
import '../App.css';

class VolunteerList extends React.Component {
  constructor(props) {
    super(props);

    props.onGetVolunteerList();
  }

  render() {
    const { volunteerList } = this.props;

    return (
      <Container>
        <Row>
          {volunteerList.map(volunteer => (
            <Col xs={12} sm={6} lg={4}>
              <VolunteerCard volunteer={volunteer} />
            </Col>
          ))}
        </Row>
      </Container>
    );
  }
}

const mapStateToProps = state => ({
  volunteerList: state.volunteers.volunteerList
});

const mapDispatchToProps = dispatch => ({
  onGetVolunteerList: () => dispatch(getVolunteerList())
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(VolunteerList);
