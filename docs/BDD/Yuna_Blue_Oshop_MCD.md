# Mocodo

```text
TYPE: type_code,name, description, footer_order, created_at, updated_at
is, 0N TYPE, 11 PRODUCT

BRAND: brand_code,name, description, footer_order, created_at, updated_at
made, 0N BRAND, 11 PRODUCT
PRODUCT: product_code,name,rating,price,description,image,size, created_at, updated_at


CATEGORY: category_code,name, description,image, home_order, created_at, updated_at
is tagged, 0N CATEGORY, 01 PRODUCT
```

## version officielle

```text
BRAND: brand code, brand name, footer order
made, 0N BRAND, 11 PRODUCT
PRODUCT: product code, product name, description, picture, price, rate, status
is tagged as, 01 PRODUCT, 0N CATEGORY
CATEGORY: category code, category name, subtitle, picture, home order

TYPE: type code, type name, footer order
is a, 0N TYPE, 11 PRODUCT
```

