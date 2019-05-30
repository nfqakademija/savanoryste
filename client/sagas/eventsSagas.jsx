import { takeLatest, call, put } from 'redux-saga/effects';
import axios from 'axios';
import { endpoints } from '../endpoints';

export function* eventsWatcherSaga() {
  console.log('events watching');
  yield takeLatest('EVENTS_CALL_REQUEST', createEventWorkerSaga);
}

export function* eventWatcherSaga() {
  yield takeLatest('EVENT_CALL_REQUEST', eventWorkerSaga);
}

export function* createEventWatcherSaga() {
  yield takeLatest('CREATE_EVENT_REQUEST', createEventWorkerSaga);
}

function* createEventWorkerSaga(action) {
  try {
    const response = yield call(createEvent, action);
    const event = response.data;
    yield put({ type: 'CREATE_EVENT_SUCCESS', event });
  } catch (error) {
    yield put({ type: 'CREATE_EVENT_FAILURE', error });
  }
}

function fetchEvents() {
  return axios.get(endpoints.eventList);
}

function* eventsWorkerSaga(action) {
  try {
    const response = yield call(fetchEvents, action);
    const events = response.data;

    yield put({ type: 'EVENTS_CALL_SUCCESS', events });
  } catch (error) {
    yield put({ type: 'EVENTS_CALL_FAILURE', error });
  }
}

function fetchEvent(id) {
  return axios.get(endpoints.event(id));
}

function* eventWorkerSaga(action) {
  try {
    const response = yield call(fetchEvent, action.id);

    const event = response.data;
    yield put({ type: 'EVENT_CALL_SUCCESS', event });
  } catch (error) {
    yield put({ type: 'EVENT_CALL_FAILURE', error });
  }

  function createEvent(action) {
    console.log('createEvent call');
    let id = action.id;
    let data = action.data;
    let requestData = {
      firstname: data.firstname,
      lastname: data.lastname,
      phone: data.phone,
      email: data.email,
      city: data.city,
      country: data.country,
      description: data.description
    };
  
    const config = {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    };
    return axios.post(
      endpoints.createEvent(data),
      qs.stringify(requestData),
      config
    );
  }
}
