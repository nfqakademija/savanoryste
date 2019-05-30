export const hostUrl = 'https://savanoryste.projektai.nfqakademija.lt';
//export const hostUrl = 'http://127.0.0.1:8000/api';
export const endpoints = {
  volunteerList: (count, start) =>
    `${hostUrl}/api/volunteers/${start}/${count}`,
  volunteer: id => `${hostUrl}/api/volunteer/${id}`,
  eventList: () => `${hostUrl}api//events`,
  event: id => `${hostUrl}/api/event/${id}`,
  volunteerUser: id => `${hostUrl}/api/user/volunteer/${id}`,
  organisationUser: id => `${hostUrl}/api/organisation/${id}`,
  editVolunteer: id => `${hostUrl}/profile/update/${id}`
};
