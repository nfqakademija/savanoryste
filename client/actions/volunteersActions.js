export const getVolunteers = (count, start) => ({
  type: 'VOLUNTEERS_CALL_REQUEST',
  count,
  start
});

export const getVolunteer = id => ({
  type: 'VOLUNTEER_CALL_REQUEST',
  id
});

export const editVolunteer = (id, data) => {
  return {
    type: 'EDIT_VOLUNTEER_REQUEST',
    id,
    data
  };
};
