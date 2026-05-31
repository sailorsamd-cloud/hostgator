<?php
/**
 * Author: Vitaly Kukin
 * Date: 08.06.2015
 * Time: 9:42
 */

function adstm_breadcrumbs() {

    global $post;

    $text = [
        'home'     => __( 'Home', 'elgreco' ),
        'category' => __( '%s', 'elgreco', get_the_date() ),
        'search'   => __( 'Search Results for: %s', 'elgreco', get_search_query() ),
        'tag'      => __( 'Tag Archives: %s', 'elgreco', single_tag_title( '', false ) ),
        'author'   => __( 'All posts by %s', 'elgreco', get_the_author() ),
        'account' => __( 'Account', 'elgreco' ),
        'orders'  => __( 'Orders', 'elgreco' ),
        '404'      => __( 'Not Found', 'elgreco' ),
        'cart'     => __( 'Cart', 'elgreco' ),
    ];

    $show_current   = 1;            // @todo настройку в админке запилить
    $show_on_home   = 0;            // @todo настройку в админке запилить
    $show_home_link = 1;            // @todo настройку в админке запилить
    $show_title     = 1;            // @todo настройку в админке запилить
    $separate       = '<span class="bread_sep">/</span>'; //' &rsaquo; '; // @todo настройку в админке запилить
    $before         = '<span class="current">';
    $after          = '</span>';


    $home_link   = home_url( '/' );
    $link_before = '<span>';
    $link_after  = '</span>';
    $link_attr   = ' ';

    $link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    $parent_id    = $parent_id_2 = ( isset( $post->post_parent ) ) ? $post->post_parent : null;
    $frontpage_id = get_option( 'page_on_front' );

    $blog = $before .sprintf(
            '<a href="%1$s">%2$s</a>',
            home_url('blog'),
            __('Blog', 'elgreco'),
            $separate
        ). $after . $separate;


    $bread_data = [];
    $bread_data['@context'] = "https://schema.org/";
    $bread_data['@type'] = "BreadcrumbList";

    $bread_pos = 1;


    if ( adsTmpl::is_home() ) {

        if ( is_front_page() && $show_on_home == 1 ) {
            printf(
                '<div class="pr-breadcrumbs"><a href="%1$s">%2$s</a></div>',
                $home_link,
                $text[ 'home' ]
            );

            $bread_data['itemListElement'][] = [
                "@type" => "ListItem",
                "item" => [
                    "@id" => $home_link,
                    "name" => $text[ 'home' ],
                ],
                "position" => $bread_pos,
            ];
            $bread_pos++;

        }

    } else {

        echo '<div class="pr-breadcrumbs" >';

        if ( $show_home_link == 1 ) {

            $sprt = ( $frontpage_id == 0 || $parent_id != $frontpage_id ) ? $separate : '';

            printf(
                '<a href="%1$s">%2$s</a>%3$s',
                $home_link,
                $text[ 'home' ],
                $sprt
            );

            $bread_data['itemListElement'][] = [
                "@type" => "ListItem",
                "item" => [
                    "@id" => $home_link,
                    "name" => $text[ 'home' ],
                ],
                "position" => $bread_pos,
            ];
            $bread_pos++;
        }

        if ( is_category() ) {

            echo $blog;

            $this_cat = get_category( get_query_var( 'cat' ), false );

            if ( $this_cat->parent != 0 ) {

                $cats = get_category_parents( $this_cat->parent, true, $separate );

                if ( $show_current == 0 ) {
                    $cats = preg_replace( "#^(.+)$separate$#", "$1", $cats );
                }

                $cats = str_replace( '<a', $link_before . '<a' . $link_attr, $cats );
                $cats = str_replace( '</a>', '</a>' . $link_after, $cats );

                if ( $show_title == 0 ) {
                    $cats = preg_replace( '/ title="(.*?)"/', '', $cats );
                }

                echo $cats;
            }

            if ( $show_current == 1 ) {
                echo $before . sprintf( $text[ 'category' ], single_cat_title( '', false ) ) . $after;
            }

        } elseif( is_tax( 'product_cat' ) ) {

            $term = get_queried_object();

            $categories = get_categories( [ 'taxonomy' => 'product_cat' ] );

            $parent = $term->parent;

            $foo = getLineCat( $categories, $parent,  [] );

            $foo = array_reverse( $foo );

            foreach( $foo as $_term ) {
                printf( $link, get_term_link( $_term ), $_term->name );
                echo $separate;

                $bread_data['itemListElement'][] = [
                    "@type" => "ListItem",
                    "item" => [
                        "@id" => get_term_link( $_term ),
                        "name" => $_term->name,
                    ],
                    "position" => $bread_pos,
                ];
                $bread_pos++;
            }

            if ( $show_current == 1 ) {
                echo $link_before . $term->name . $link_after;
            }


        } elseif ( is_search() ) {

            echo $before . sprintf( $text[ 'search' ], get_search_query() ) . $after;

        } elseif ( is_day() ) {
            echo sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $separate;
            echo sprintf( $link, get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ) ) . $separate;
            echo $before . get_the_time( 'd' ) . $after;

        } elseif ( is_month() ) {
            echo sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $separate;
            echo $before . get_the_time( 'F' ) . $after;

        } elseif ( is_year() ) {
            echo $before . get_the_time( 'Y' ) . $after;

        } elseif ( is_single() && ! is_attachment() ) {

            if ( get_post_type() == 'product' ) {

                $terms = wp_get_post_terms( $post->ID, 'product_cat' );

                if ( $terms ) {

                    $foo = adstm_sort_terms( $terms );

                    if(!$foo){
                        $term = searchLastCart($terms);

                        $categories = get_categories( [ 'taxonomy' => 'product_cat' ] );

                        $parent = $term->parent;

                        $foo = getLineCat($categories, $parent, [ $term ] );
                        $foo = array_reverse($foo);
                    }

                    $foo_first = 0;
                    foreach ( $foo as $term ) {
                        if($foo_first){
                            echo $separate;
                        }
                        printf( $link, get_term_link($term), $term->name );

                        $foo_first++;

                        $bread_data['itemListElement'][] = [
                            "@type" => "ListItem",
                            "item" => [
                                "@id" => get_term_link( $term ),
                                "name" => $term->name,
                            ],
                            "position" => $bread_pos,
                        ];
                        $bread_pos++;

                    }

                }

                if ( $show_current == 1 ) {
                    //echo $before . get_the_title() . $after;
                    $bread_data['itemListElement'][] = [
                        "@type" => "ListItem",
                        "item" => [
                            "@id" => $_SERVER['REQUEST_URI'],
                            "name" => get_the_title(),
                        ],
                        "position" => $bread_pos,
                    ];
                    $bread_pos++;

                }

            } elseif ( get_post_type() != 'post' ) {

                $tax       = ( get_post_taxonomies() ) ? current( get_post_taxonomies() ) : 'post';
                $terms     = wp_get_post_terms( $post->ID, $tax );

                if ( $terms ) {

                    $terms = adstm_sort_terms( $terms );

                    foreach ( $terms as $term ) {
                        printf( $link, get_term_link($term), $term->name );
                        echo $separate;
                    }
                }

                if ( $show_current == 1 ) {
                    echo $before . get_the_title() . $after;
                }
            } else {
                echo $blog;

                $cat  = get_the_category();
                $cat  = $cat[ 0 ];
                $cats = get_category_parents( $cat, true, $separate );
                if ( $show_current == 0 ) {
                    $cats = preg_replace( "#^(.+)$separate$#", "$1", $cats );
                }
                $cats = str_replace( '<a', $link_before . '<a' . $link_attr, $cats );
                $cats = str_replace( '</a>', '</a>' . $link_after, $cats );
                if ( $show_title == 0 ) {
                    $cats = preg_replace( '/ title="(.*?)"/', '', $cats );
                }
                echo $cats;
                if ( $show_current == 1 ) {
                    echo $before . get_the_title() . $after;
                }
            }

        } elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() ) {

            $post_type = get_post_type_object( get_post_type() );

            $terms = '';
            if ( isset( $post->ID ) ) {
                $terms = get_the_terms( $post->ID, get_query_var( 'taxonomy' ) );

                $terms = adstm_sort_terms( $terms );
            }
            $term_p = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

            if ( $term_p && $term_p->parent ) {
                if ( $terms ) {
                    $last_term = array_pop( $terms );

                    foreach ( $terms as $term ) {
                        printf( $link, get_term_link($term), $term->name );
                        echo $separate;

                        $bread_data['itemListElement'][] = [
                            "@type" => "ListItem",
                            "item" => [
                                "@id" => get_term_link( $term ),
                                "name" => $term->name,
                            ],
                            "position" => $bread_pos,
                        ];
                        $bread_pos++;
                    }

                    echo $before . $last_term->name . $after;
                } else {

                    if($term_p->parent != 0) {
                        echo get_category_parents($term_p->parent, TRUE, ' ' . $separate . ' ');
                    };

                    printf( $link, get_term_link($term_p->term_id,get_query_var( 'taxonomy' )), $term_p->name );
                }
            } elseif ( $term_p ) {
                echo $before . $term_p->name . $after;
            } elseif ( $post_type ) {
                echo $before . $post_type->labels->name . $after;
            }
        } elseif ( is_attachment() ) {
            $parent = get_post( $parent_id );
            $cat    = get_the_category( $parent->ID );
            $cat    = $cat[ 0 ];

            if ( $cat ) {
                $cats = get_category_parents( $cat, true, $separate );
                $cats = str_replace( '<a', $link_before . '<a' . $link_attr, $cats );
                $cats = str_replace( '</a>', '</a>' . $link_after, $cats );
                if ( $show_title == 0 ) {
                    $cats = preg_replace( '/ title="(.*?)"/', '', $cats );
                }
                echo $cats;
            }
            printf( $link, get_permalink( $parent ), $parent->post_title );
            if ( $show_current == 1 ) {
                echo $separate . $before . get_the_title() . $after;
            }

        } elseif ( is_page() && ! $parent_id ) {
            if ( $show_current == 1 ) {
                echo $before . get_the_title() . $after;
            }

        } elseif ( is_page() && $parent_id ) {
            if ( $parent_id != $frontpage_id ) {
                $breadcrumbs = array();
                while ( $parent_id ) {
                    $page = get_page( $parent_id );
                    if ( $parent_id != $frontpage_id ) {
                        $breadcrumbs[] = sprintf( $link, get_permalink( $page->ID ), get_the_title( $page->ID ) );
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse( $breadcrumbs );
                for ( $i = 0; $i < count( $breadcrumbs ); $i ++ ) {
                    echo $breadcrumbs[ $i ];
                    if ( $i != count( $breadcrumbs ) - 1 ) {
                        echo $separate;
                    }
                }
            }
            if ( $show_current == 1 ) {
                if ( $show_home_link == 1 || ( $parent_id_2 != 0 && $parent_id_2 != $frontpage_id ) ) {
                    echo $separate;
                }
                echo $before . get_the_title() . $after;
            }

        } elseif ( is_tag() ) {
            echo $before . sprintf( $text[ 'tag' ], single_tag_title( '', false ) ) . $after;

        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata( $author );
            echo $before . sprintf( $text[ 'author' ], $userdata->display_name ) . $after;

        } elseif ( 	isset($text[get_query_var( 'pagename' )] )) {
            echo $before . $text[get_query_var( 'pagename' )] . $after;

        }elseif ( is_404() ) {
            echo $before . $text[ '404' ] . $after;

        } elseif ( has_post_format() && ! is_singular() ) {
            echo get_post_format_string( get_post_format() );
        }

        echo '</div><!-- .breadcrumbs -->';
    }?>

    <script type="application/ld+json">
        <?php echo json_encode($bread_data); ?>
    </script> <?php
}

function adstm_sort_terms( $terms, $foo = [], $parent = 0 ) {

    if ( ! $terms || empty( $terms ) ) {
        return $foo;
    }

    foreach ( $terms as $term ) {

        if ( $parent == $term->parent ) {
            $foo[] = $term;

            return adstm_sort_terms( $terms, $foo, $term->term_id );
        }
    }

    return $foo;
}

function getLineCat( $categories, $parent, $too ) {

    reset( $categories );

    foreach( $categories as $cat ) {

        if( $parent && $parent == $cat->term_id ) {

            $parent = $cat->category_parent;

            $too[] = $cat;

            return getLineCat($categories, $parent, $too);

        } elseif( ! $parent ) {
            return $too;
        }

    }

    return [];
}

function searchLastCart( $terms,  $foo = [] ) {

    $parent = array_map( function( $term ){ return $term->parent; }, $terms );

    foreach( $terms as $term ) {

        if( ! in_array( $term->term_id, $parent ) ) {
            return $term;
            break;
        }
    }

    return $terms[0];
}