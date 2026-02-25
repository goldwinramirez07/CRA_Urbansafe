import { expect } from 'vitest'
import { fireEvent } from '@testing-library/dom'
import '@testing-library/jest-dom'
import Alpine from 'alpinejs'

beforeEach(async () => {
  document.body.innerHTML = `
    <div id="root">
      <div x-data="{ count: 0 }">
        <button id="inc" x-on:click="count++">Increment</button>
        <span id="value" x-text="count"></span>
      </div>
    </div>
  `
  window.Alpine = Alpine
  Alpine.start()

  await Alpine.nextTick()
})

afterEach(() => {
  try { Alpine.stop() } catch (e) {}
  document.body.innerHTML = ''
})

test('increments counter when button clicked', async () => {
  const button = document.getElementById('inc')
  const value = document.getElementById('value')
  expect(value).toHaveTextContent('0')
  await fireEvent.click(button)
  await Alpine.nextTick()
  expect(value).toHaveTextContent('1')
})
