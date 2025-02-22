const //
  body = document.getElementsByTagName('body')[0],
  mobile_nav = document.getElementsByClassName('mobile-nav')[0],
  mobile_nav__open = document.getElementsByClassName('mobile-nav-open')[0],
  mobile_nav__close = mobile_nav.getElementsByClassName('mobile-nav-close')[0];

mobile_nav__open?.addEventListener('click', open);
mobile_nav__close?.addEventListener('click', close);
body.addEventListener('click', ({ target }) => {
  if (target instanceof Element && getParent(target, '[class^="mobile-nav"]') === false)
    close();
});

function open() {
  mobile_nav.classList.add('open');
}

function close() {
  mobile_nav.classList.remove('open');
}

function getParent(elt: Element, match: string): (Element | false) {
  if (elt.matches(match))
    return elt;
  while (!elt.matches(match) && elt.parentElement !== null && elt.parentElement.nodeName != 'BODY' && elt.parentElement.parentElement) {
    elt = elt.parentElement;
  }
  if (elt.parentElement == null || elt.parentElement.nodeName == 'BODY')
    return false;
  else
    return elt;
}