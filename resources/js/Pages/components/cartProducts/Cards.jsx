/* eslint-disable react/prop-types */
import { Link } from "@inertiajs/react";
import { useState, memo } from "react";
import AppLayout from '@/Pages/AppLayout';
import PropTypes from 'prop-types';

// Utility functions outside the component
const getImageUrl = (imagePath) => {
  if (!imagePath) return '/storage/data/placeholder.jpg';
  const cleanPath = imagePath.replace(/^\/+/, '').replace(/^storage\//, '');
  return `/${cleanPath.startsWith('storage/') ? cleanPath : `storage/${cleanPath}`}`;
};

const formatPrice = (price) => {
  if (!price) return "N/A";
  return new Intl.NumberFormat('en-US').format(price);
};

// Memoized Product Card Component
const ProductCard = memo(({ item, category, isHovered, onHover }) => {
  const [isLoading, setIsLoading] = useState(true);

  return (
    <div
      className="rounded-lg border border-gray-200 bg-white shadow-sm h-full flex flex-col overflow-hidden"
      onMouseEnter={() => onHover(item.id)}
      onMouseLeave={() => onHover(null)}
    >
      <Link href={`/${category}/${item.id}`} className="block">
        <div className="relative aspect-square">
          {isLoading && (
            <div className="absolute inset-0 bg-gray-200 animate-pulse"></div>
          )}
          <img
            src={getImageUrl(
              isHovered && item.images[0]?.images[1] 
                ? item.images[0].images[1] 
                : item.images[0]?.images[0]
            )}
            alt={item.title ? `${item.title} product image` : "Product image"}
            className={`w-full h-full object-cover transition-opacity duration-300 ${
              isHovered ? 'opacity-90' : 'opacity-100'
            }`}
            loading="lazy"
            onLoad={() => setIsLoading(false)}
            onLoadStart={() => setIsLoading(true)}
            onError={(e) => {
              e.target.onerror = null;
              e.target.src = '/storage/data/placeholder.jpg';
              setIsLoading(false);
            }}
          />
          {!!item.isNew && (
            <div className="absolute top-2 right-2 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded-full">
              New
            </div>
          )}
        </div>
      </Link>

      <div className="py-5 px-2.5 flex flex-col h-full">
        <div className="mb-4 flex items-center justify-between gap-4 bg-black/20 w-fit rounded-full">
          <span className="p-1 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800">
            Up to {item.sold || "10"}% off
          </span>
        </div>

        <Link
          href={`/${category}/${item.id}`} 
          className="!capitalize text-lg font-semibold leading-tight text-gray-900 hover:underline"
        >
          {item.title || "Unnamed Product"}
        </Link>

        <p className="text-gray-600 my-1 text-sm line-clamp-2">
          {item.description || "No description available."}
        </p>

        <div className="mt-2 flex items-center gap-2">
          <div className="flex items-center">
            {[...Array(5)].map((_, i) => (
              <svg
                key={i}
                className="h-4 w-4 text-yellow-400"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 24 24"
              >
                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
              </svg>
            ))}
          </div>
          <p className="text-sm font-medium text-gray-900">5.0</p>
        </div>

        <ul className="my-2 flex items-center gap-4">
          <li className="flex items-center gap-2">
            <svg
              className="h-4 w-4 text-gray-500"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
            >
              <path
                stroke="currentColor"
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth="2"
                d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"
              />
            </svg>
            <p className="text-sm font-medium text-gray-500">Fast Delivery</p>
          </li>
          <li className="flex items-center gap-2">
            <svg
              className="h-4 w-4 text-gray-500"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
            >
              <path
                stroke="currentColor"
                strokeLinecap="round"
                strokeWidth="2"
                d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"
              />
            </svg>
            <p className="text-sm font-medium text-gray-500">Best Price</p>
          </li>
        </ul>

        <div className="mt-auto flex items-center justify-between gap-4">
          <p className="text-2xl font-extrabold leading-tight text-gray-900">
            {formatPrice(item.price)} DH
          </p>
          <button
            type="button"
            className="inline-flex items-center rounded-lg bg-black px-5 py-2.5 text-sm font-medium text-white focus:outline-none focus:ring-4 focus:ring-primary-300"
            aria-label={`Add ${item.title} to cart`}
            onClick={(e) => {
              e.preventDefault();
              console.log("Added to cart:", item.title);
            }}
          >
            <svg
              className="-ms-2 me-2 h-5 w-5"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              fill="none"
              viewBox="0 0 24 24"
            >
              <path
                stroke="currentColor"
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth="2"
                d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"
              />
            </svg>
            <Link href={`/${category}/${item.id}`} aria-hidden="true">
              Add to cart
            </Link>
          </button>
        </div>
      </div>
    </div>
  );
});

ProductCard.propTypes = {
  item: PropTypes.object.isRequired,
  category: PropTypes.string.isRequired,
  isHovered: PropTypes.bool,
  onHover: PropTypes.func.isRequired
};

// Main Cards Component
const Cards = ({ filteredItems, category }) => {
  const [hoveredItem, setHoveredItem] = useState(null);

  if (!filteredItems || filteredItems.length === 0) {
    return (
      <div className="text-center font-bold uppercase mt-4 text-gray-600">
        No items found.
      </div>
    );
  }

  return (
    <div className="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      {filteredItems.map((item) => (
        <ProductCard
          key={item.id}
          item={item}
          category={category}
          isHovered={hoveredItem === item.id}
          onHover={setHoveredItem}
        />
      ))}
    </div>
  );
};

Cards.propTypes = {
  filteredItems: PropTypes.arrayOf(
    PropTypes.shape({
      id: PropTypes.oneOfType([PropTypes.string, PropTypes.number]).isRequired,
      title: PropTypes.string,
      description: PropTypes.string,
      price: PropTypes.number,
      images: PropTypes.array,
      isNew: PropTypes.bool,
      sold: PropTypes.number,
    })
  ),
  category: PropTypes.string.isRequired,
};

Cards.layout = page => <AppLayout>{page}</AppLayout>;

export default Cards;