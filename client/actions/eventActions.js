export const getEvents = () => ({
  type: 'EVENTS_CALL_REQUEST'
});

export const getEvent = id => ({
  type: 'EVENT_CALL_REQUEST',
  id
});
