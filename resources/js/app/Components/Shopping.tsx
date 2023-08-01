import React, { Component, ReactNode } from "react";
import CardProduct from "./CardProduct";
import Swal from "sweetalert2";

type Product = {
  name: string;
  id: number;
  price: number;
  image?: string;
  link_image?: string;
  description?: string;
  quantity?: number;
  categorie: {
    id: number;
    name: string;
  };
};

type State = {
  products: Product[];
  currentPage: number;
};

export default class Shopping extends Component<{}, State> {
  constructor(props: {}) {
    super(props);
    this.state = {
      products: [
        {
          name: "Polaroid Camera",
          id: 0,
          price: 59.99,
          quantity: 1,
          categorie: {
            id: 1,
            name: "Camera",
          },
        },
        {
          name: "Atelier bizantine",
          id: 2,
          price: 59.99,
          categorie: {
            id: 1,
            name: "Appareil Photo",
          },
        },
      ],
      currentPage: 1,
    };
  }
  componentDidMount(): void {
      this.setState({
          products: JSON.parse(localStorage.cartItems || '[]')
      })
  }

  handleDelete = (product: Product) => {
    Swal.fire({
      title: "Are you sure?",
      text: `Do you want to remove ${product.name} from your cart?`,
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Yes, remove it!",
    }).then((result) => {
      if (result.isConfirmed) {
        const updatedProducts = this.state.products.filter(
          (p) => p.id !== product.id
        );
        this.setState({ products: updatedProducts });
        localStorage.setItem("cartItems", JSON.stringify(updatedProducts));
        Swal.fire("Deleted!", `${product.name} has been removed.`, "success");
      }
    });
  };

  renderProducts = (): ReactNode => {
    const { products, currentPage } = this.state;
    const productsPerPage = 5;
    const startIndex = (currentPage - 1) * productsPerPage;
    const endIndex = startIndex + productsPerPage;

    return products
      .slice(startIndex, endIndex)
      .map((product) => (
        <CardProduct
          key={product.id}
          {...product}
          onDelete={() => this.handleDelete(product)}
        />
      ));
  };

  renderPagination = (): ReactNode => {
    const { products, currentPage } = this.state;
    const pagesCount = Math.ceil(products.length / 5);

    return (
      <nav aria-label="Pagination" className="flex justify-center">
        <button
          type="button"
          className="inline-flex items-center px-2 py-2 text-sm font-semibold border rounded-l-md dark:border-gray-700"
          onClick={() =>
            this.setState({ currentPage: currentPage - 1 || 1 })
          }
          disabled={currentPage === 1}
        >
          <span className="sr-only">Previous</span>
          <svg  xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            aria-hidden="true"
            className="w-5 h-5"
          >
            <path
              fillRule="evenodd"
              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
              clipRule="evenodd"
            />
          </svg>
        </button>
        {Array.from({ length: pagesCount }).map((_, i) => (
          <button
            key={i}
            type="button"
            className={`inline-flex items-center px-4 py-2 text-sm font-semibold border ${
              currentPage === i + 1
                ? "dark:bg-violet-400 dark:text-gray-900 dark:border-gray-700"
                : "dark:border-gray-700"
            }`}
            onClick={() => this.setState({ currentPage: i + 1 })}
            aria-current={currentPage === i + 1 ? "page" : undefined}
          >
            {i + 1}
          </button>
        ))}
        <button
          type="button"
          className="inline-flex items-center px-2 py-2 text-sm font-semibold border rounded-r-md dark:border-gray-700"
          onClick={() =>
            this.setState({ currentPage: currentPage + 1 || pagesCount })
          }
          disabled={currentPage === pagesCount}
        >
          <span className="sr-only">Next</span>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
            fill="currentColor" aria-hidden="true" className="w-5 h-5">
            <path
              fillRule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
              clipRule="evenodd"
            ></path>
          </svg>
        </button>
      </nav>
    );
  };

  render(): ReactNode {
    return (
      <div className="w-full">
        <div className="flex flex-col max-w-3xl p-6 space-y-4 sm:p-10">
          <h2 className="text-xl font-semibold">Your cart</h2>
          <ul className="flex flex-col divide-y divide-gray-700">
            {this.renderProducts()}
          </ul>
          <div className="space-y-1 text-right">
            <p>
              Total amount:
              <span className="font-semibold">
                {this.state?.products?.reduce(
                  (total, product) => total + product.price*product.quantity,
                  0
                )}{" "}
                €
              </span>
            </p>
            <p className="text-sm dark:text-gray-400">
              Not including taxes and shipping costs
            </p>
          </div>
          {this.renderPagination()}
          <div className="flex justify-end space-x-4">
            <button
              type="button"
              className="px-6 py-2 border rounded-md dark:border-violet-400"
            >
              Back
              <span className="sr-only sm:not-sr-only">to shop</span>
            </button>
            <button
              type="button"
              className="px-6 py-2 border rounded-md dark:bg-violet-400 dark:text-gray-900 dark:border-violet-400"
            >
              <span className="sr-only sm:not-sr-only">Continue to</span>
              Checkout
            </button>
          </div>
        </div>
      </div>
    );
  }
}