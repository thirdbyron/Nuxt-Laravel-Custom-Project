export class Service {
  static defaults(item) {
    if (!Array.isArray(item)) item = [item];
    let elements = [];
    console.log(item, "ser");

    item[0].settings.sections.forEach(section => {
      section.elements.forEach(element => {
        elements.push(element);
      });
    });

    console.log(elements, "forserel");

    return elements.filter(element => element.is_default == 1);
  }
}
