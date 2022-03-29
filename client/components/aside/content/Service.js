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

  static arraysAreEqual(array1, array2) {
    console.log(
      array1,
      array2,
      "servivivivi",
      array1.every(element => array2.includes(element)) &&
        array2.every(element => array1.includes(element))
    );
    return (
      array1.every(element => array2.includes(element)) &&
      array2.every(element => array1.includes(element))? true : false
    );
  }
}
