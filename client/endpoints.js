export const hostUrl = 'https://savanoryste.projektai.nfqakademija.lt/api';

export const endpoints = {
  volunteerList: () => `${hostUrl}/volunteers`,
  volunteer: id => `${hostUrl}/volunteer/${id}`
};
