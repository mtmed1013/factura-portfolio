import { TestBed } from '@angular/core/testing';

import { FactsDetailsService } from './facts-details-service';

describe('FactsDetailsService', () => {
  let service: FactsDetailsService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(FactsDetailsService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
