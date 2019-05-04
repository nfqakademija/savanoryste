export const getVolunteers = () => ({
  type: 'VOLUNTEERS_CALL_REQUEST'
});

export const getVolunteer = id => ({
  type: 'VOLUNTEER_CALL_REQUEST',
  id
});
