import axios from 'axios';
import { GET_VOLUNTEER_LIST } from './types';

export const getVolunteerList = () => dispatch => {
  axios
    .get('http://savanoryste.projektai.nfqakademija.lt/api/volunteers')
    .then(res => {
      dispatch({
        type: GET_VOLUNTEER_LIST,
        payload: res.data
      });
    });
};

export const getVolunteerById = id => dispatch => {
  axios
    .get(`http://savanoryste.projektai.nfqakademija.lt/api/volunteer/${id}`)
    .then(res => {
      dispatch({
        type: GET_VOLUNTEER_LIST,
        payload: res.data
      });
    });
};
