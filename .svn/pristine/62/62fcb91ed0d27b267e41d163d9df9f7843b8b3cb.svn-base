import { STORAGE_KEY } from './mutations'

const localStoragePlugin = store => {
  store.subscribe((mutation, { planlists }) => {
    window.localStorage.setItem(STORAGE_KEY, JSON.stringify(planlists))
  })
}

export default [localStoragePlugin]
