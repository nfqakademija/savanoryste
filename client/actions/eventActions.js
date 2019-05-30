export const getEvents = () => ({
  type: 'EVENTS_CALL_REQUEST'
});

export const getEvent = id => ({
  type: 'EVENT_CALL_REQUEST',
  id
});

export const createEvent = data => ({
  type: 'CREATE_EVENT_REQUEST',
  data
});
