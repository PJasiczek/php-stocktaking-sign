import { TestBed } from '@angular/core/testing';

import { HttpOrdersService } from './http-orders.service';

describe('HttpOrdersService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: HttpOrdersService = TestBed.get(HttpOrdersService);
    expect(service).toBeTruthy();
  });
});
