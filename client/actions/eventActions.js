export const getEvents = (count, start) => ({
  type: 'EVENTS_CALL_REQUEST',
  count,
  start
});

export const getEvent = id => ({
  type: 'EVENT_CALL_REQUEST',
  id
});
