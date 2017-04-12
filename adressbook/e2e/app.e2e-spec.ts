import { AdressbookPage } from './app.po';

describe('adressbook App', () => {
  let page: AdressbookPage;

  beforeEach(() => {
    page = new AdressbookPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
