import { all } from 'redux-saga/effects';

import { watcherSaga } from './volunteersSagas';

export default function* rootSaga() {
  yield all([watcherSaga()]);
}
