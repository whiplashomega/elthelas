"use strict";
/*global browser*/
//import assert from 'assert';
var assert = require('assert');

describe('fixture', () => {
  it('has the expected page title', () => {
    browser.url('/');
    assert.equal(browser.getTitle(), 'Elthelas Campaign Setting');
  });
});