import React from 'react';
import { connect } from 'react-redux';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import InfiniteScroll from 'react-infinite-scroll-component';
import { getEvents } from '../../actions/eventActions';

import '../App.css';
import EventCard from './EventCard';

class EventList extends React.Component {
  constructor(props) {
    super(props);
  }

  componentDidMount() {
    this.fetchEvents();
  }

  fetchEvents = () => {
    const { count, start, getEvents } = this.props;

    getEvents(start, count);
  };

  render() {
    const { events } = this.props;
    return (
      <InfiniteScroll
        dataLength={this.props.events.length}
        next={this.fetchVolunteers}
        hasMore={true}
        height={800}
      >
        <Container className="container">
          <Row>
            {events.map(event => (
              <Col xs={12} md={6} lg={4}>
                <EventCard event={event} />
              </Col>
            ))}
          </Row>
        </Container>
      </InfiniteScroll>
    );
  }
}

const mapStateToProps = state => ({
  events: state.events.events
});

const mapDispatchToProps = dispatch => ({
  getEvents: (count, start) => dispatch(getEvents(start, count))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(EventList);
