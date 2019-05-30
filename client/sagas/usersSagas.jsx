import { takeLatest, call, put } from 'redux-saga/effects';
import axios from 'axios';
import { endpoints } from '../endpoints';

export function* volunteerUserWatcherSaga() {
  console.log('watching');
  yield takeLatest('VOLUNTEER_USER_CALL_REQUEST', volunteerUserWorkerSaga);
}

function fetchVolunteerUser(id) {
  console.log('fetching user');
  return axios.get(endpoints.volunteerUser(id));
}

function* volunteerUserWorkerSaga(action) {
  console.log(action, 'action');
  try {
    const response = yield call(fetchVolunteerUser, action.id);
    console.log(response, 'resp');
    const user = response.data;
    yield put({ type: 'VOLUNTEER_USER_CALL_SUCCESS', user });
  } catch (error) {
    yield put({ type: 'VOLUNTEER_USER_CALL_FAILURE', error });
  }
}

export function* organisationUserWatcherSaga() {
  yield takeLatest(
    'ORGANISATION_USER_CALL_REQUEST',
    organisationUserWorkerSaga
  );
}

function fetchOrganisationUser(id) {
  return axios.get(endpoints.organisationUser(id));
}

function* organisationUserWorkerSaga(action) {
  try {
    const response = yield call(fetchOrganisationUser, action.id);
    const user = response.data;
    yield put({ type: 'ORGANISATION_USER_CALL_SUCCESS', user });
  } catch (error) {
    yield put({ type: 'ORGANISATOIN_USER_CALL_FAILURE', error });
  }
}
