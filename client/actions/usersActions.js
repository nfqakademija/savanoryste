export const getVolunteerUser = id => ({
  type: 'VOLUNTEER_USER_CALL_REQUEST',
  id
});

export const getOrganisationUser = id => ({
  type: 'ORGANISATION_USER_CALL_REQUEST',
  id
});
