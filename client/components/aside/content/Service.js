export class Service {

  static defaults(item) {
    if(!Array.isArray(item)) item = [item];
    let elements = [];
    console.log(item, 'ser');

    item[0].settings.sections.forEach(section => {
      console.log( section.elements, 'forser' );
      if(section.elements.length > 0) elements = [...section.elements];
    });

    console.log( elements, 'forserel' );

    return elements.filter(element => element.is_default == 1);
  }
}
