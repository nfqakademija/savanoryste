export const getVolunteers = (count, start) => ({
  type: 'VOLUNTEERS_CALL_REQUEST',
  count,
  start
});

export const getVolunteer = id => ({
  type: 'VOLUNTEER_CALL_REQUEST',
  id
});
