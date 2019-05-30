export const getVolunteerUser = id => {
  console.log(id, 'action in actions');
  return {
    type: 'VOLUNTEER_USER_CALL_REQUEST',
    id
  };
};

export const getOrganisationUser = id => ({
  type: 'ORGANISATION_USER_CALL_REQUEST',
  id
});
