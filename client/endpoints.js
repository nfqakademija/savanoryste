// export const hostUrl = 'https://savanoryste.projektai.nfqakademija.lt/api';
export const hostUrl = 'http://127.0.0.1:8000/api';
export const endpoints = {
  volunteerList: (count, start) => `${hostUrl}/volunteers/${start}/${count}`,
  volunteer: id => `${hostUrl}/volunteer/${id}`,
  eventList: () => `${hostUrl}/events`,
  event: id => `${hostUrl}/event/${id}`,
  volunteerUser: id => `${hostUrl}/user/volunteer/${id}`,
  organisationUser: id => `${hostUrl}/organisation/${id}`,
  editVolunteer: id => `http://127.0.0.1:8000/profile/update/${id}`
};
