$(window).load(
    function () {
        $(
            ".selector-wrapper:eq(0)"
        ).hide();
    }
);

var selectCallback = function (variant, selector) {
    timber.productPage({
        money_format:
            "<span class=money>${{amount}}</span>",
        variant: variant,
        selector: selector,
    });

    // in stock product
    if (variant) {
        if (
            variant.inventory_management ==
            "shopify" &&
            variant.inventory_policy != "continue"
        ) {
            if (variant.inventory_quantity > 0) {
                jQuery("#variant-inventory").text(
                    variant.inventory_quantity +
                    " in stock"
                );
            } else {
                jQuery("#variant-inventory").text(
                    "Out of stock"
                );
            }
        } else {
            jQuery("#variant-inventory").text(
                "In stock"
            );
        }
    } else {
        jQuery("#variant-inventory").text("");
    }
};

// jQuery(function ($) {
//     new Shopify.OptionSelectors("productSelect", {
//         product: {
//             id: 349115940899,
//             title: "dummy Product name",
//             handle: "dummy-product-name-6",
//             on:
//                 '\u003cp\u003eThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.\u003c\/p\u003e\n[short_on]\n\u003cp\u003eThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.\u003c\/p\u003e\n[\/short_on] [product_on]\n\u003cp\u003eContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\u003c\/p\u003e\n\u003cp\u003eThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\u003c\/p\u003e\n[\/product_on]',
//             published_at:
//                 "2017-11-02T00:53:59-04:00",
//             created_at: "2017-11-02T00:54:03-04:00",
//             vendor: "navana",
//             type: "assorted",
//             tags: [
//                 "black",
//                 "brown",
//                 "cyan",
//                 "glass",
//                 "gold",
//                 "gray",
//                 "L",
//                 "M",
//                 "steel",
//                 "wood",
//                 "X",
//             ],
//             price: 8000,
//             price_min: 8000,
//             price_max: 8000,
//             available: true,
//             price_varies: false,
//             compare_at_price: null,
//             compare_at_price_min: 0,
//             compare_at_price_max: 0,
//             compare_at_price_varies: false,
//             variants: [
//                 {
//                     id: 4653251788835,
//                     title: "X \/ black \/ wood",
//                     option1: "X",
//                     option2: "black",
//                     option3: "wood",
//                     sku: "11253201",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - X \/ black \/ wood",
//                     public_title:
//                         "X \/ black \/ wood",
//                     options: ["X", "black", "wood"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 11,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653251821603,
//                     title: "X \/ black \/ glass",
//                     option1: "X",
//                     option2: "black",
//                     option3: "glass",
//                     sku: "11253202",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - X \/ black \/ glass",
//                     public_title:
//                         "X \/ black \/ glass",
//                     options: [
//                         "X",
//                         "black",
//                         "glass",
//                     ],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653251854371,
//                     title: "X \/ black \/ steel",
//                     option1: "X",
//                     option2: "black",
//                     option3: "steel",
//                     sku: "11253203",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - X \/ black \/ steel",
//                     public_title:
//                         "X \/ black \/ steel",
//                     options: [
//                         "X",
//                         "black",
//                         "steel",
//                     ],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653251887139,
//                     title: "X \/ brown \/ wood",
//                     option1: "X",
//                     option2: "brown",
//                     option3: "wood",
//                     sku: "11253204",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - X \/ brown \/ wood",
//                     public_title:
//                         "X \/ brown \/ wood",
//                     options: ["X", "brown", "wood"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653251919907,
//                     title: "X \/ brown \/ glass",
//                     option1: "X",
//                     option2: "brown",
//                     option3: "glass",
//                     sku: "11253205",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - X \/ brown \/ glass",
//                     public_title:
//                         "X \/ brown \/ glass",
//                     options: [
//                         "X",
//                         "brown",
//                         "glass",
//                     ],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653251952675,
//                     title: "X \/ brown \/ steel",
//                     option1: "X",
//                     option2: "brown",
//                     option3: "steel",
//                     sku: "11253206",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - X \/ brown \/ steel",
//                     public_title:
//                         "X \/ brown \/ steel",
//                     options: [
//                         "X",
//                         "brown",
//                         "steel",
//                     ],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653251985443,
//                     title: "X \/ cyan \/ wood",
//                     option1: "X",
//                     option2: "cyan",
//                     option3: "wood",
//                     sku: "11253207",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - X \/ cyan \/ wood",
//                     public_title:
//                         "X \/ cyan \/ wood",
//                     options: ["X", "cyan", "wood"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252018211,
//                     title: "X \/ cyan \/ glass",
//                     option1: "X",
//                     option2: "cyan",
//                     option3: "glass",
//                     sku: "11253208",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - X \/ cyan \/ glass",
//                     public_title:
//                         "X \/ cyan \/ glass",
//                     options: ["X", "cyan", "glass"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252050979,
//                     title: "X \/ cyan \/ steel",
//                     option1: "X",
//                     option2: "cyan",
//                     option3: "steel",
//                     sku: "11253209",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - X \/ cyan \/ steel",
//                     public_title:
//                         "X \/ cyan \/ steel",
//                     options: ["X", "cyan", "steel"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252083747,
//                     title: "X \/ gold \/ wood",
//                     option1: "X",
//                     option2: "gold",
//                     option3: "wood",
//                     sku: "11253210",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - X \/ gold \/ wood",
//                     public_title:
//                         "X \/ gold \/ wood",
//                     options: ["X", "gold", "wood"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252116515,
//                     title: "X \/ gold \/ glass",
//                     option1: "X",
//                     option2: "gold",
//                     option3: "glass",
//                     sku: "11253211",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - X \/ gold \/ glass",
//                     public_title:
//                         "X \/ gold \/ glass",
//                     options: ["X", "gold", "glass"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252149283,
//                     title: "X \/ gold \/ steel",
//                     option1: "X",
//                     option2: "gold",
//                     option3: "steel",
//                     sku: "11253212",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - X \/ gold \/ steel",
//                     public_title:
//                         "X \/ gold \/ steel",
//                     options: ["X", "gold", "steel"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252182051,
//                     title: "X \/ gray \/ wood",
//                     option1: "X",
//                     option2: "gray",
//                     option3: "wood",
//                     sku: "11253213",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - X \/ gray \/ wood",
//                     public_title:
//                         "X \/ gray \/ wood",
//                     options: ["X", "gray", "wood"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252214819,
//                     title: "X \/ gray \/ glass",
//                     option1: "X",
//                     option2: "gray",
//                     option3: "glass",
//                     sku: "11253214",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - X \/ gray \/ glass",
//                     public_title:
//                         "X \/ gray \/ glass",
//                     options: ["X", "gray", "glass"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252247587,
//                     title: "X \/ gray \/ steel",
//                     option1: "X",
//                     option2: "gray",
//                     option3: "steel",
//                     sku: "11253215",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - X \/ gray \/ steel",
//                     public_title:
//                         "X \/ gray \/ steel",
//                     options: ["X", "gray", "steel"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252280355,
//                     title: "L \/ black \/ wood",
//                     option1: "L",
//                     option2: "black",
//                     option3: "wood",
//                     sku: "11253216",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - L \/ black \/ wood",
//                     public_title:
//                         "L \/ black \/ wood",
//                     options: ["L", "black", "wood"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252313123,
//                     title: "L \/ black \/ glass",
//                     option1: "L",
//                     option2: "black",
//                     option3: "glass",
//                     sku: "11253217",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - L \/ black \/ glass",
//                     public_title:
//                         "L \/ black \/ glass",
//                     options: [
//                         "L",
//                         "black",
//                         "glass",
//                     ],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252345891,
//                     title: "L \/ black \/ steel",
//                     option1: "L",
//                     option2: "black",
//                     option3: "steel",
//                     sku: "11253218",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - L \/ black \/ steel",
//                     public_title:
//                         "L \/ black \/ steel",
//                     options: [
//                         "L",
//                         "black",
//                         "steel",
//                     ],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252378659,
//                     title: "L \/ brown \/ wood",
//                     option1: "L",
//                     option2: "brown",
//                     option3: "wood",
//                     sku: "11253219",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - L \/ brown \/ wood",
//                     public_title:
//                         "L \/ brown \/ wood",
//                     options: ["L", "brown", "wood"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252411427,
//                     title: "L \/ brown \/ glass",
//                     option1: "L",
//                     option2: "brown",
//                     option3: "glass",
//                     sku: "11253220",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - L \/ brown \/ glass",
//                     public_title:
//                         "L \/ brown \/ glass",
//                     options: [
//                         "L",
//                         "brown",
//                         "glass",
//                     ],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252444195,
//                     title: "L \/ brown \/ steel",
//                     option1: "L",
//                     option2: "brown",
//                     option3: "steel",
//                     sku: "11253221",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - L \/ brown \/ steel",
//                     public_title:
//                         "L \/ brown \/ steel",
//                     options: [
//                         "L",
//                         "brown",
//                         "steel",
//                     ],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252476963,
//                     title: "L \/ cyan \/ wood",
//                     option1: "L",
//                     option2: "cyan",
//                     option3: "wood",
//                     sku: "11253222",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - L \/ cyan \/ wood",
//                     public_title:
//                         "L \/ cyan \/ wood",
//                     options: ["L", "cyan", "wood"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252509731,
//                     title: "L \/ cyan \/ glass",
//                     option1: "L",
//                     option2: "cyan",
//                     option3: "glass",
//                     sku: "11253223",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - L \/ cyan \/ glass",
//                     public_title:
//                         "L \/ cyan \/ glass",
//                     options: ["L", "cyan", "glass"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252542499,
//                     title: "L \/ cyan \/ steel",
//                     option1: "L",
//                     option2: "cyan",
//                     option3: "steel",
//                     sku: "11253224",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - L \/ cyan \/ steel",
//                     public_title:
//                         "L \/ cyan \/ steel",
//                     options: ["L", "cyan", "steel"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252575267,
//                     title: "L \/ gold \/ wood",
//                     option1: "L",
//                     option2: "gold",
//                     option3: "wood",
//                     sku: "11253225",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - L \/ gold \/ wood",
//                     public_title:
//                         "L \/ gold \/ wood",
//                     options: ["L", "gold", "wood"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252608035,
//                     title: "L \/ gold \/ glass",
//                     option1: "L",
//                     option2: "gold",
//                     option3: "glass",
//                     sku: "11253226",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - L \/ gold \/ glass",
//                     public_title:
//                         "L \/ gold \/ glass",
//                     options: ["L", "gold", "glass"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252640803,
//                     title: "L \/ gold \/ steel",
//                     option1: "L",
//                     option2: "gold",
//                     option3: "steel",
//                     sku: "11253227",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - L \/ gold \/ steel",
//                     public_title:
//                         "L \/ gold \/ steel",
//                     options: ["L", "gold", "steel"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252673571,
//                     title: "L \/ gray \/ wood",
//                     option1: "L",
//                     option2: "gray",
//                     option3: "wood",
//                     sku: "11253228",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - L \/ gray \/ wood",
//                     public_title:
//                         "L \/ gray \/ wood",
//                     options: ["L", "gray", "wood"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252706339,
//                     title: "L \/ gray \/ glass",
//                     option1: "L",
//                     option2: "gray",
//                     option3: "glass",
//                     sku: "11253229",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - L \/ gray \/ glass",
//                     public_title:
//                         "L \/ gray \/ glass",
//                     options: ["L", "gray", "glass"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252739107,
//                     title: "L \/ gray \/ steel",
//                     option1: "L",
//                     option2: "gray",
//                     option3: "steel",
//                     sku: "11253230",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - L \/ gray \/ steel",
//                     public_title:
//                         "L \/ gray \/ steel",
//                     options: ["L", "gray", "steel"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252771875,
//                     title: "M \/ black \/ wood",
//                     option1: "M",
//                     option2: "black",
//                     option3: "wood",
//                     sku: "11253231",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - M \/ black \/ wood",
//                     public_title:
//                         "M \/ black \/ wood",
//                     options: ["M", "black", "wood"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252804643,
//                     title: "M \/ black \/ glass",
//                     option1: "M",
//                     option2: "black",
//                     option3: "glass",
//                     sku: "11253232",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - M \/ black \/ glass",
//                     public_title:
//                         "M \/ black \/ glass",
//                     options: [
//                         "M",
//                         "black",
//                         "glass",
//                     ],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252837411,
//                     title: "M \/ black \/ steel",
//                     option1: "M",
//                     option2: "black",
//                     option3: "steel",
//                     sku: "11253233",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - M \/ black \/ steel",
//                     public_title:
//                         "M \/ black \/ steel",
//                     options: [
//                         "M",
//                         "black",
//                         "steel",
//                     ],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252870179,
//                     title: "M \/ brown \/ wood",
//                     option1: "M",
//                     option2: "brown",
//                     option3: "wood",
//                     sku: "11253234",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - M \/ brown \/ wood",
//                     public_title:
//                         "M \/ brown \/ wood",
//                     options: ["M", "brown", "wood"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252902947,
//                     title: "M \/ brown \/ glass",
//                     option1: "M",
//                     option2: "brown",
//                     option3: "glass",
//                     sku: "11253235",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - M \/ brown \/ glass",
//                     public_title:
//                         "M \/ brown \/ glass",
//                     options: [
//                         "M",
//                         "brown",
//                         "glass",
//                     ],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252935715,
//                     title: "M \/ brown \/ steel",
//                     option1: "M",
//                     option2: "brown",
//                     option3: "steel",
//                     sku: "11253236",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - M \/ brown \/ steel",
//                     public_title:
//                         "M \/ brown \/ steel",
//                     options: [
//                         "M",
//                         "brown",
//                         "steel",
//                     ],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653252968483,
//                     title: "M \/ cyan \/ wood",
//                     option1: "M",
//                     option2: "cyan",
//                     option3: "wood",
//                     sku: "11253237",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - M \/ cyan \/ wood",
//                     public_title:
//                         "M \/ cyan \/ wood",
//                     options: ["M", "cyan", "wood"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653253001251,
//                     title: "M \/ cyan \/ glass",
//                     option1: "M",
//                     option2: "cyan",
//                     option3: "glass",
//                     sku: "11253238",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - M \/ cyan \/ glass",
//                     public_title:
//                         "M \/ cyan \/ glass",
//                     options: ["M", "cyan", "glass"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653253034019,
//                     title: "M \/ cyan \/ steel",
//                     option1: "M",
//                     option2: "cyan",
//                     option3: "steel",
//                     sku: "11253239",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - M \/ cyan \/ steel",
//                     public_title:
//                         "M \/ cyan \/ steel",
//                     options: ["M", "cyan", "steel"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653253066787,
//                     title: "M \/ gold \/ wood",
//                     option1: "M",
//                     option2: "gold",
//                     option3: "wood",
//                     sku: "11253240",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - M \/ gold \/ wood",
//                     public_title:
//                         "M \/ gold \/ wood",
//                     options: ["M", "gold", "wood"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653253099555,
//                     title: "M \/ gold \/ glass",
//                     option1: "M",
//                     option2: "gold",
//                     option3: "glass",
//                     sku: "11253241",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - M \/ gold \/ glass",
//                     public_title:
//                         "M \/ gold \/ glass",
//                     options: ["M", "gold", "glass"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653253132323,
//                     title: "M \/ gold \/ steel",
//                     option1: "M",
//                     option2: "gold",
//                     option3: "steel",
//                     sku: "11253242",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - M \/ gold \/ steel",
//                     public_title:
//                         "M \/ gold \/ steel",
//                     options: ["M", "gold", "steel"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653253165091,
//                     title: "M \/ gray \/ wood",
//                     option1: "M",
//                     option2: "gray",
//                     option3: "wood",
//                     sku: "11253243",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - M \/ gray \/ wood",
//                     public_title:
//                         "M \/ gray \/ wood",
//                     options: ["M", "gray", "wood"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653253197859,
//                     title: "M \/ gray \/ glass",
//                     option1: "M",
//                     option2: "gray",
//                     option3: "glass",
//                     sku: "11253244",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - M \/ gray \/ glass",
//                     public_title:
//                         "M \/ gray \/ glass",
//                     options: ["M", "gray", "glass"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//                 {
//                     id: 4653253230627,
//                     title: "M \/ gray \/ steel",
//                     option1: "M",
//                     option2: "gray",
//                     option3: "steel",
//                     sku: "11253245",
//                     requires_shipping: true,
//                     taxable: true,
//                     featured_image: null,
//                     available: true,
//                     name: "dummy Product name - M \/ gray \/ steel",
//                     public_title:
//                         "M \/ gray \/ steel",
//                     options: ["M", "gray", "steel"],
//                     price: 8000,
//                     weight: 0,
//                     compare_at_price: null,
//                     inventory_quantity: 12,
//                     inventory_management: "shopify",
//                     inventory_policy: "deny",
//                     barcode: "UPC",
//                 },
//             ],
//             images: [
//                 "\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/6_17d38881-c66b-47c8-81e3-cf41f4980922.jpg?v=1509598443",
//                 "#\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/23_4dea319b-3948-482c-86e8-633ab23020ee.jpg?v=1509598443",
//                 "#\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/24_affb80d0-414a-4305-be25-d5a7905a3053.jpg?v=1509598443",
//                 "#\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/29_12aa79a7-329d-47c0-9561-0b2d7d86fb76.jpg?v=1509598443",
//                 "#\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/3_a8c8cb2b-da5a-4ebd-86a5-f82b14f74be2.jpg?v=1509598443",
//                 "#\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/4_bd7a32ee-a5f0-490d-9ab9-b670e1993949.jpg?v=1509598443",
//                 "\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/5_23c8c676-7272-4cc3-abb0-40d1be4b216d.jpg?v=1509598443",
//             ],
//             featured_image:
//                 "\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/6_17d38881-c66b-47c8-81e3-cf41f4980922.jpg?v=1509598443",
//             options: ["Size", "Color", "Material"],
//             media: [
//                 {
//                     alt: null,
//                     id: 716875792419,
//                     position: 1,
//                     preview_image: {
//                         aspect_ratio: 1.0,
//                         height: 800,
//                         width: 800,
//                         src: "https:\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/6_17d38881-c66b-47c8-81e3-cf41f4980922.jpg?v=1509598443",
//                     },
//                     aspect_ratio: 1.0,
//                     height: 800,
//                     media_type: "image",
//                     src: "https:\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/6_17d38881-c66b-47c8-81e3-cf41f4980922.jpg?v=1509598443",
//                     width: 800,
//                 },
//                 {
//                     alt: null,
//                     id: 716875825187,
//                     position: 2,
//                     preview_image: {
//                         aspect_ratio: 1.0,
//                         height: 800,
//                         width: 800,
//                         src: "https:\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/23_4dea319b-3948-482c-86e8-633ab23020ee.jpg?v=1509598443",
//                     },
//                     aspect_ratio: 1.0,
//                     height: 800,
//                     media_type: "image",
//                     src: "https:\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/23_4dea319b-3948-482c-86e8-633ab23020ee.jpg?v=1509598443",
//                     width: 800,
//                 },
//                 {
//                     alt: null,
//                     id: 716875857955,
//                     position: 3,
//                     preview_image: {
//                         aspect_ratio: 1.0,
//                         height: 800,
//                         width: 800,
//                         src: "https:\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/24_affb80d0-414a-4305-be25-d5a7905a3053.jpg?v=1509598443",
//                     },
//                     aspect_ratio: 1.0,
//                     height: 800,
//                     media_type: "image",
//                     src: "https:\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/24_affb80d0-414a-4305-be25-d5a7905a3053.jpg?v=1509598443",
//                     width: 800,
//                 },
//                 {
//                     alt: null,
//                     id: 716875890723,
//                     position: 4,
//                     preview_image: {
//                         aspect_ratio: 1.0,
//                         height: 800,
//                         width: 800,
//                         src: "https:\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/29_12aa79a7-329d-47c0-9561-0b2d7d86fb76.jpg?v=1509598443",
//                     },
//                     aspect_ratio: 1.0,
//                     height: 800,
//                     media_type: "image",
//                     src: "https:\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/29_12aa79a7-329d-47c0-9561-0b2d7d86fb76.jpg?v=1509598443",
//                     width: 800,
//                 },
//                 {
//                     alt: null,
//                     id: 716875923491,
//                     position: 5,
//                     preview_image: {
//                         aspect_ratio: 1.0,
//                         height: 800,
//                         width: 800,
//                         src: "https:\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/3_a8c8cb2b-da5a-4ebd-86a5-f82b14f74be2.jpg?v=1509598443",
//                     },
//                     aspect_ratio: 1.0,
//                     height: 800,
//                     media_type: "image",
//                     src: "https:\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/3_a8c8cb2b-da5a-4ebd-86a5-f82b14f74be2.jpg?v=1509598443",
//                     width: 800,
//                 },
//                 {
//                     alt: null,
//                     id: 716875956259,
//                     position: 6,
//                     preview_image: {
//                         aspect_ratio: 1.0,
//                         height: 800,
//                         width: 800,
//                         src: "https:\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/4_bd7a32ee-a5f0-490d-9ab9-b670e1993949.jpg?v=1509598443",
//                     },
//                     aspect_ratio: 1.0,
//                     height: 800,
//                     media_type: "image",
//                     src: "https:\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/4_bd7a32ee-a5f0-490d-9ab9-b670e1993949.jpg?v=1509598443",
//                     width: 800,
//                 },
//                 {
//                     alt: null,
//                     id: 716875989027,
//                     position: 7,
//                     preview_image: {
//                         aspect_ratio: 1.0,
//                         height: 800,
//                         width: 800,
//                         src: "https:\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/5_23c8c676-7272-4cc3-abb0-40d1be4b216d.jpg?v=1509598443",
//                     },
//                     aspect_ratio: 1.0,
//                     height: 800,
//                     media_type: "image",
//                     src: "https:\/\/cdn.shopify.com\/s\/files\/1\/2508\/8358\/products\/5_23c8c676-7272-4cc3-abb0-40d1be4b216d.jpg?v=1509598443",
//                     width: 800,
//                 },
//             ],
//             content:
//                 '\u003cp\u003eThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.\u003c\/p\u003e\n[short_on]\n\u003cp\u003eThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.\u003c\/p\u003e\n[\/short_on] [product_on]\n\u003cp\u003eContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\u003c\/p\u003e\n\u003cp\u003eThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\u003c\/p\u003e\n[\/product_on]',
//         },
//         onVariantSelected: selectCallback,
//         enableHistoryState: true,
//     });

//     // Add label if only one product option and it isn't 'Title'. Could be 'Size'.

//     // Hide selectors if we only have 1 variant and its title contains 'Default'.
// });


jQuery(
    '.swatch[data-option-index="0"] .x'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );
jQuery(
    '.swatch[data-option-index="0"] .x'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .x'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .x'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .x'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .x'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .x'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .x'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .x'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .x'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .x'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .x'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .x'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .x'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .x'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


{/* <div
    data-value="L"
    class="
    swatch-element
    l
    available
"
>
    <input
        id="swatch-0-l"
        type="radio"
        name="option-0"
        value="L"
    />

    <label
        for="swatch-0-l"
    >
        L
    </label>
</div> */}

jQuery(
    '.swatch[data-option-index="0"] .l'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .l'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .l'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .l'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .l'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .l'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .l'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .l'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .l'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .l'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .l'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .l'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .l'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .l'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );


jQuery(
    '.swatch[data-option-index="0"] .l'
)
    .removeClass(
        "soldout"
    )
    .addClass(
        "available"
    )
    .find(
        ":radio"
    )
    .removeAttr(
        "disabled"
    );