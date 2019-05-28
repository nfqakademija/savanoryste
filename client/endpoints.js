export const hostUrl = 'https://savanoryste.projektai.nfqakademija.lt/api';

export const endpoints = {
  volunteerList: (count, start) => `${hostUrl}/volunteers/${start}/${count}`,
  volunteer: id => `${hostUrl}/volunteer/${id}`,
  eventList: () => `${hostUrl}/events`,
  event: id => `${hostUrl}/event/${id}`
};
