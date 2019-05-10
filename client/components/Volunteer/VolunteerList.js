import React from 'react';
import { connect } from 'react-redux';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import VolunteerCard from './VolunteerCard';
import InfiniteScroll from 'react-infinite-scroll-component';
import { getVolunteers } from '../../actions/volunteersActions';

import '../App.css';

class VolunteerList extends React.Component {
  constructor(props) {
    super(props);

    // props.getVolunteers();
  }

  componentDidMount() {
    this.fetchVolunteers();
  }

  fetchVolunteers = () => {
    const { count, start, getVolunteers } = this.props;

    getVolunteers(start, count);
  };

  render() {
    const { volunteers } = this.props;
    console.log(volunteers);
    return (
      <InfiniteScroll
        dataLength={this.props.volunteers.length}
        next={this.fetchVolunteers}
        hasMore={true}
      >
        <Container className="container">
          <Row>
            {volunteers.map(volunteer => (
              <Col xs={12} sm={6} md={4} lg={3}>
                <VolunteerCard volunteer={volunteer} />
              </Col>
            ))}
          </Row>
        </Container>
      </InfiniteScroll>
    );
  }
}

const mapStateToProps = state => ({
  volunteers: state.volunteers.volunteers,
  loading: state.volunteers.loading,
  start: state.volunteers.start,
  count: state.volunteers.count
});

const mapDispatchToProps = dispatch => ({
  getVolunteers: (count, start) => dispatch(getVolunteers(start, count))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(VolunteerList);
