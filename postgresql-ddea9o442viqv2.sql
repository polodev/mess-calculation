--
-- PostgreSQL database dump
--

-- Dumped from database version 11.2 (Ubuntu 11.2-1.pgdg16.04+1)
-- Dumped by pg_dump version 11.3 (Ubuntu 11.3-1.pgdg18.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: bazars; Type: TABLE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE TABLE public.bazars (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    cost integer NOT NULL,
    type character varying(255) DEFAULT 'regular'::character varying NOT NULL,
    title character varying(255),
    date date NOT NULL,
    more_info text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.bazars OWNER TO zwuvvxdaawwgfs;

--
-- Name: bazars_id_seq; Type: SEQUENCE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE SEQUENCE public.bazars_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bazars_id_seq OWNER TO zwuvvxdaawwgfs;

--
-- Name: bazars_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER SEQUENCE public.bazars_id_seq OWNED BY public.bazars.id;


--
-- Name: debitcredits; Type: TABLE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE TABLE public.debitcredits (
    id bigint NOT NULL,
    credit_to bigint NOT NULL,
    debit_to bigint NOT NULL,
    date date NOT NULL,
    amount integer NOT NULL,
    more_info text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.debitcredits OWNER TO zwuvvxdaawwgfs;

--
-- Name: debitcredits_id_seq; Type: SEQUENCE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE SEQUENCE public.debitcredits_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.debitcredits_id_seq OWNER TO zwuvvxdaawwgfs;

--
-- Name: debitcredits_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER SEQUENCE public.debitcredits_id_seq OWNED BY public.debitcredits.id;


--
-- Name: meals; Type: TABLE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE TABLE public.meals (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    date date NOT NULL,
    number_of_meal integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.meals OWNER TO zwuvvxdaawwgfs;

--
-- Name: meals_id_seq; Type: SEQUENCE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE SEQUENCE public.meals_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.meals_id_seq OWNER TO zwuvvxdaawwgfs;

--
-- Name: meals_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER SEQUENCE public.meals_id_seq OWNED BY public.meals.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO zwuvvxdaawwgfs;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO zwuvvxdaawwgfs;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO zwuvvxdaawwgfs;

--
-- Name: roles; Type: TABLE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.roles OWNER TO zwuvvxdaawwgfs;

--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO zwuvvxdaawwgfs;

--
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- Name: telescope_entries; Type: TABLE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE TABLE public.telescope_entries (
    sequence bigint NOT NULL,
    uuid uuid NOT NULL,
    batch_id uuid NOT NULL,
    family_hash character varying(255),
    should_display_on_index boolean DEFAULT true NOT NULL,
    type character varying(20) NOT NULL,
    content text NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.telescope_entries OWNER TO zwuvvxdaawwgfs;

--
-- Name: telescope_entries_sequence_seq; Type: SEQUENCE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE SEQUENCE public.telescope_entries_sequence_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.telescope_entries_sequence_seq OWNER TO zwuvvxdaawwgfs;

--
-- Name: telescope_entries_sequence_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER SEQUENCE public.telescope_entries_sequence_seq OWNED BY public.telescope_entries.sequence;


--
-- Name: telescope_entries_tags; Type: TABLE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE TABLE public.telescope_entries_tags (
    entry_uuid uuid NOT NULL,
    tag character varying(255) NOT NULL
);


ALTER TABLE public.telescope_entries_tags OWNER TO zwuvvxdaawwgfs;

--
-- Name: telescope_monitoring; Type: TABLE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE TABLE public.telescope_monitoring (
    tag character varying(255) NOT NULL
);


ALTER TABLE public.telescope_monitoring OWNER TO zwuvvxdaawwgfs;

--
-- Name: user_months; Type: TABLE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE TABLE public.user_months (
    id bigint NOT NULL,
    year_month date NOT NULL,
    user_ids json NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.user_months OWNER TO zwuvvxdaawwgfs;

--
-- Name: user_months_id_seq; Type: SEQUENCE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE SEQUENCE public.user_months_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_months_id_seq OWNER TO zwuvvxdaawwgfs;

--
-- Name: user_months_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER SEQUENCE public.user_months_id_seq OWNED BY public.user_months.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    display_name character varying(255),
    slug character varying(255) NOT NULL,
    role_id bigint DEFAULT '3'::bigint NOT NULL,
    email character varying(255) NOT NULL,
    provider character varying(255),
    provider_id character varying(255),
    others character varying(255),
    email_verified_at timestamp(0) without time zone,
    password character varying(255),
    enable boolean DEFAULT true NOT NULL,
    address text,
    city character varying(255),
    postal_code character varying(255),
    mobile character varying(255),
    voter_id_no character varying(255),
    passport_no character varying(255),
    date_of_birth character varying(255),
    remember_token character varying(100),
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO zwuvvxdaawwgfs;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO zwuvvxdaawwgfs;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: bazars id; Type: DEFAULT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.bazars ALTER COLUMN id SET DEFAULT nextval('public.bazars_id_seq'::regclass);


--
-- Name: debitcredits id; Type: DEFAULT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.debitcredits ALTER COLUMN id SET DEFAULT nextval('public.debitcredits_id_seq'::regclass);


--
-- Name: meals id; Type: DEFAULT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.meals ALTER COLUMN id SET DEFAULT nextval('public.meals_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- Name: telescope_entries sequence; Type: DEFAULT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.telescope_entries ALTER COLUMN sequence SET DEFAULT nextval('public.telescope_entries_sequence_seq'::regclass);


--
-- Name: user_months id; Type: DEFAULT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.user_months ALTER COLUMN id SET DEFAULT nextval('public.user_months_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: bazars; Type: TABLE DATA; Schema: public; Owner: zwuvvxdaawwgfs
--

COPY public.bazars (id, user_id, cost, type, title, date, more_info, created_at, updated_at) FROM stdin;
3	1	550	others	gas	2019-05-01	gas cylinder purchase from 2nd floor	2019-05-07 00:20:04	2019-05-07 00:21:09
2	1	430	others	lizol + mob	2019-05-01	mob tooks 300, lizol tooks 130	2019-05-07 00:17:26	2019-05-07 00:21:21
5	1	675	others	hari, patil	2019-05-01	rice pot = 165, \r\nbelcha- 30,\r\ndust basket - 80,\r\nfen galani - 150,\r\ntool - 130\r\nspoon (3) - 120	2019-05-07 00:24:21	2019-05-07 00:25:12
6	1	180	others	da	2019-05-05	180	2019-05-07 00:25:52	2019-05-07 00:25:52
8	4	700	regular	rice	2019-05-02	purchase rice and others. money given by shibu	2019-05-07 00:28:56	2019-05-07 00:28:56
9	1	100	others	khanti ...	2019-05-04	khanti, hari dharani, klean cleaning pad	2019-05-07 00:43:42	2019-05-07 00:43:42
10	1	345	regular	meat..	2019-05-04	meat 250,\r\npotato, spice, garlic 75\r\nchilli 10\r\nvim 10	2019-05-07 00:48:23	2019-05-07 00:56:57
12	4	335	regular	meat	2019-05-02	220,\r\n70,\r\n35	2019-05-07 01:16:05	2019-05-07 01:16:05
13	4	350	regular	fish...	2019-05-03	130, 30, 60, 110, 20	2019-05-07 01:18:17	2019-05-07 01:18:17
14	4	1090	regular	rice meat	2019-05-06	\N	2019-05-07 01:18:48	2019-05-07 01:18:48
15	3	43	regular	Egg, morich	2019-05-05	33, 10	2019-05-07 01:27:53	2019-05-07 01:27:53
4	1	2050	others	internet bill	2019-05-01	internet bill for may and june. 2 months at a time for free installation	2019-05-07 00:20:58	2019-05-07 01:30:44
16	3	320	regular	fish, vegetable	2019-05-07	fish, vegetable	2019-05-07 18:08:52	2019-05-07 18:08:52
17	3	50	regular	onion	2019-05-07	\N	2019-05-07 22:14:39	2019-05-07 22:14:39
18	3	50	regular	moshlar bati	2019-05-08	moshlar bati	2019-05-08 20:18:28	2019-05-08 20:18:28
19	1	270	others	mama + dust	2019-05-08	mama bill 100,\r\ndust bill 170	2019-05-09 01:56:35	2019-05-09 01:56:35
20	1	1200	others	pure it filter	2019-05-09	pureit filter	2019-05-10 09:48:07	2019-05-10 09:48:07
21	1	40	regular	vim	2019-05-09	4pc vin x 10tk	2019-05-10 09:48:48	2019-05-10 09:48:48
22	4	193	regular	piage, daul, moshla	2019-05-11	\N	2019-05-11 21:22:22	2019-05-11 21:22:22
23	1	595	regular	fish + oil	2019-05-12	pabda fish - 330,\r\nkacha bazar - 100 (begun - 30, deros - 20, chilli - 10, alu - 40 ) ,\r\nMudi - 165 (oil 1ltr, jira gura, dhania gura)	2019-05-12 19:07:19	2019-05-12 19:07:19
24	3	620	regular	meat,fish	2019-05-16	\N	2019-05-16 18:42:39	2019-05-16 18:42:39
25	1	210	common	lighter + handwash	2019-05-12	lighter 120 + handwash 90	2019-05-16 18:54:11	2019-05-16 18:54:11
26	2	305	regular	Chicken	2019-05-18	\N	2019-05-18 13:22:44	2019-05-18 13:22:44
27	3	88	regular	dim,alu,onion,tel	2019-05-18	\N	2019-05-18 23:00:08	2019-05-18 23:00:08
28	1	110	regular	oil, mina, deros	2019-05-19	oil 55,\r\nderos 30, mina 25	2019-05-19 22:16:55	2019-05-19 22:16:55
29	4	90	common	hand wash	2019-05-05	\N	2019-05-20 14:56:02	2019-05-20 14:56:02
30	1	20	regular	data	2019-05-15	purchase data around May 15. Not sure about exact date	2019-05-20 18:11:14	2019-05-20 18:11:14
31	1	20	regular	data	2019-05-20	data - 20	2019-05-20 18:11:35	2019-05-20 18:11:35
32	4	60	regular	piag, morich	2019-05-20	\N	2019-05-20 19:22:01	2019-05-20 19:22:01
33	4	15	regular	egg	2019-05-21	\N	2019-05-21 14:35:28	2019-05-21 14:35:28
34	4	55	regular	oil	2019-05-21	\N	2019-05-21 18:19:59	2019-05-21 18:19:59
35	2	360	regular	chal dal	2019-05-24	\N	2019-05-24 23:21:14	2019-05-24 23:21:14
36	2	370	regular	murgi	2019-05-15	\N	2019-05-24 23:21:36	2019-05-24 23:21:36
37	2	1150	others	gas cilinder	2019-05-23	\N	2019-05-24 23:22:11	2019-05-24 23:22:11
38	1	190	regular	fish data	2019-05-24	fish data chilli	2019-05-26 12:47:28	2019-05-26 12:47:28
39	1	100	regular	egg	2019-05-26	egg 70, vegetable 30	2019-05-27 20:29:28	2019-05-27 20:29:28
40	1	470	regular	chicken, vegetable	2019-05-27	Chicken and vegetable by rasel and tuhin	2019-05-27 20:30:01	2019-05-27 20:30:01
41	3	45	regular	roshun morich	2019-05-27	\N	2019-05-27 21:20:25	2019-05-27 21:20:25
42	1	344	regular	meat onion	2019-05-28	meat 204,\r\nonion 35,\r\nspice 20,\r\ngarlic &   ginger - 15,\r\nturmeric - 45,\r\nchilli - 25	2019-05-28 21:22:38	2019-05-29 00:45:00
43	2	640	regular	rice and meat	2019-05-30	rice 265,\r\nmeat 180,	2019-05-30 21:23:30	2019-05-30 21:23:30
44	2	555	regular	rice oil lentin	2019-05-28	rice 265,\r\nlentil 120,\r\noil 105,	2019-05-30 21:25:01	2019-05-30 21:25:01
45	1	200	common	polythene for bin	2019-06-03	purchase polythene for bin bag	2019-06-10 23:50:16	2019-06-10 23:50:16
46	1	393	regular	meat, rice, spice	2019-06-09	meat - 198,\r\ngocery 195 (oil, rice, spice)	2019-06-10 23:51:12	2019-06-10 23:51:12
47	1	20	common	Lighting  Match	2019-06-03	1 dozen match	2019-06-10 23:58:10	2019-06-10 23:58:10
48	1	398	regular	meat rice	2019-06-11	meat 300,\r\nonion, giner, garlic, spice - 88,\r\nrice and oil - 110,	2019-06-11 21:40:57	2019-06-11 21:40:57
49	3	240	regular	meat, masala	2019-06-12	\N	2019-06-13 19:13:49	2019-06-13 19:13:49
50	3	130	common	vegetable jhuri	2019-06-13	\N	2019-06-13 20:02:20	2019-06-13 20:02:20
51	3	30	regular	shak morich	2019-06-13	\N	2019-06-13 20:03:02	2019-06-13 20:03:02
52	4	545	regular	rice, egg	2019-06-13	\N	2019-06-13 20:03:49	2019-06-13 20:03:49
53	5	675	regular	\N	2019-06-14	\N	2019-06-14 12:23:25	2019-06-14 12:23:25
54	1	55	regular	Potato onion	2019-06-11	Onion 1kg 35,\r\nPotato 1kg 20	2019-06-14 22:50:10	2019-06-14 22:50:10
\.


--
-- Data for Name: debitcredits; Type: TABLE DATA; Schema: public; Owner: zwuvvxdaawwgfs
--

COPY public.debitcredits (id, credit_to, debit_to, date, amount, more_info, created_at, updated_at) FROM stdin;
1	1	2	2019-05-01	100	mama clean the room	2019-05-07 00:18:14	2019-05-07 00:18:14
2	1	3	2019-05-01	50	mama clean the room	2019-05-07 00:18:32	2019-05-07 00:18:32
8	4	1	2019-05-06	1000	\N	2019-05-07 01:20:55	2019-05-07 01:20:55
9	3	1	2019-05-06	1000	\N	2019-05-07 01:21:52	2019-05-07 01:21:52
10	2	1	2019-05-07	1000	gave 3k which includes 2.5k rent. 500 tk extra plus old advanced money from tuhin rasel	2019-05-07 22:21:36	2019-05-07 22:21:36
5	1	4	2019-05-02	700	I give 700 tk to rasel to shop for mess	2019-05-07 00:51:39	2019-05-07 22:59:40
4	1	4	2019-05-01	50	mama cleaning bill for first day	2019-05-07 00:41:58	2019-05-07 23:00:05
\.


--
-- Data for Name: meals; Type: TABLE DATA; Schema: public; Owner: zwuvvxdaawwgfs
--

COPY public.meals (id, user_id, date, number_of_meal, created_at, updated_at) FROM stdin;
2	1	2019-05-02	1	2019-05-07 00:58:18	2019-05-07 00:58:18
5	1	2019-05-05	1	2019-05-07 00:58:27	2019-05-07 00:58:27
87	1	2019-05-22	1	2019-05-26 12:48:33	2019-05-26 12:48:33
8	1	2019-05-06	1	2019-05-07 01:22:36	2019-05-07 01:22:36
4	1	2019-05-04	3	2019-05-07 00:58:24	2019-05-07 01:22:39
3	1	2019-05-03	1	2019-05-07 00:58:21	2019-05-07 01:22:42
73	1	2019-05-21	1	2019-05-21 01:37:21	2019-05-26 12:48:40
6	4	2019-05-02	2	2019-05-07 01:09:27	2019-05-07 01:24:38
7	4	2019-05-03	2	2019-05-07 01:09:29	2019-05-07 01:24:41
9	4	2019-05-04	2	2019-05-07 01:24:44	2019-05-07 01:24:44
10	4	2019-05-05	1	2019-05-07 01:25:05	2019-05-07 01:25:05
11	4	2019-05-06	2	2019-05-07 01:25:07	2019-05-07 01:25:07
12	3	2019-05-02	2	2019-05-07 01:28:20	2019-05-07 01:28:20
13	3	2019-05-03	2	2019-05-07 01:28:29	2019-05-07 01:28:29
14	3	2019-05-04	3	2019-05-07 01:28:33	2019-05-07 01:28:33
15	3	2019-05-05	1	2019-05-07 01:28:44	2019-05-07 01:28:44
16	3	2019-05-06	2	2019-05-07 01:28:46	2019-05-07 01:28:46
88	4	2019-05-26	1	2019-05-27 00:35:57	2019-05-27 00:35:57
89	3	2019-05-26	1	2019-05-27 00:36:19	2019-05-27 00:36:19
19	2	2019-05-01	0	2019-05-07 22:30:00	2019-05-07 22:30:00
20	2	2019-05-03	2	2019-05-07 22:30:05	2019-05-07 22:30:05
21	2	2019-05-02	2	2019-05-07 22:30:05	2019-05-07 22:30:05
22	2	2019-05-04	2	2019-05-07 22:30:07	2019-05-07 22:30:07
23	2	2019-05-05	1	2019-05-07 22:30:11	2019-05-07 22:30:11
24	2	2019-05-06	2	2019-05-07 22:30:25	2019-05-07 22:30:25
25	1	2019-05-07	1	2019-05-07 23:27:19	2019-05-07 23:27:19
18	3	2019-05-07	2	2019-05-07 22:16:36	2019-05-08 00:44:48
26	4	2019-05-07	2	2019-05-08 00:45:42	2019-05-08 00:45:42
27	2	2019-05-07	2	2019-05-08 00:46:11	2019-05-08 00:46:11
90	1	2019-05-23	1	2019-05-27 20:27:53	2019-05-27 20:27:53
91	1	2019-05-24	1	2019-05-27 20:27:57	2019-05-27 20:27:57
28	3	2019-05-08	2	2019-05-08 20:19:14	2019-05-08 20:19:14
29	4	2019-05-08	2	2019-05-08 20:20:24	2019-05-08 20:20:24
30	2	2019-05-08	2	2019-05-08 20:21:22	2019-05-08 20:21:22
31	1	2019-05-08	1	2019-05-09 01:55:18	2019-05-09 01:55:18
17	1	2019-05-09	1	2019-05-07 10:56:30	2019-05-10 13:52:19
32	4	2019-05-09	1	2019-05-10 16:49:04	2019-05-10 16:49:04
33	2	2019-05-09	1	2019-05-10 16:51:00	2019-05-10 16:51:00
93	1	2019-05-25	1	2019-05-27 20:28:06	2019-05-27 20:28:06
34	4	2019-05-10	1	2019-05-11 02:14:21	2019-05-11 02:14:21
35	2	2019-05-10	1	2019-05-11 02:14:46	2019-05-11 02:14:46
36	1	2019-05-10	1	2019-05-11 21:45:29	2019-05-11 21:45:29
37	1	2019-05-11	2	2019-05-11 21:45:32	2019-05-11 21:45:32
92	1	2019-05-26	2	2019-05-27 20:28:04	2019-05-27 20:28:17
1	1	2019-05-01	0	2019-05-07 00:58:15	2019-05-12 21:13:53
38	4	2019-05-11	1	2019-05-13 20:16:08	2019-05-13 20:16:08
39	4	2019-05-12	1	2019-05-13 20:16:09	2019-05-13 20:16:09
40	4	2019-05-13	1	2019-05-14 05:10:59	2019-05-14 05:10:59
41	4	2019-05-14	1	2019-05-16 17:45:44	2019-05-16 17:45:44
42	4	2019-05-15	1	2019-05-16 17:45:47	2019-05-16 17:45:47
44	1	2019-05-12	1	2019-05-16 18:52:10	2019-05-16 18:52:10
45	1	2019-05-13	1	2019-05-16 18:52:12	2019-05-16 18:52:12
46	1	2019-05-14	1	2019-05-16 18:52:13	2019-05-16 18:52:13
48	1	2019-05-16	1	2019-05-16 18:52:22	2019-05-16 18:52:22
47	1	2019-05-15	2	2019-05-16 18:52:17	2019-05-16 18:52:24
49	4	2019-05-16	2	2019-05-17 21:51:32	2019-05-17 21:51:32
43	3	2019-05-16	2	2019-05-16 18:44:03	2019-05-17 21:52:05
50	2	2019-05-17	2	2019-05-18 01:28:02	2019-05-18 01:28:02
51	2	2019-05-16	2	2019-05-18 01:28:03	2019-05-18 01:28:03
52	2	2019-05-15	2	2019-05-18 01:28:04	2019-05-18 01:28:04
53	2	2019-05-14	2	2019-05-18 01:28:06	2019-05-18 01:28:06
54	2	2019-05-13	1	2019-05-18 01:28:07	2019-05-18 01:28:07
55	2	2019-05-12	1	2019-05-18 01:28:08	2019-05-18 01:28:08
56	2	2019-05-11	1	2019-05-18 01:28:09	2019-05-18 01:28:09
57	4	2019-05-17	1	2019-05-18 01:28:46	2019-05-18 01:28:46
58	3	2019-05-17	1	2019-05-18 01:29:15	2019-05-18 01:29:15
59	3	2019-05-18	2	2019-05-18 23:01:05	2019-05-18 23:01:05
60	4	2019-05-18	2	2019-05-18 23:01:17	2019-05-18 23:01:17
61	2	2019-05-18	2	2019-05-18 23:02:12	2019-05-18 23:02:12
62	1	2019-05-17	1	2019-05-19 12:35:50	2019-05-19 12:35:50
63	1	2019-05-18	3	2019-05-19 12:35:52	2019-05-19 12:36:04
65	4	2019-05-19	2	2019-05-19 14:33:11	2019-05-19 14:33:11
66	2	2019-05-19	1	2019-05-19 21:55:10	2019-05-19 21:55:14
67	3	2019-05-19	2	2019-05-19 21:55:53	2019-05-19 21:55:53
68	1	2019-05-19	1	2019-05-19 22:21:00	2019-05-19 22:21:00
69	4	2019-05-20	2	2019-05-20 19:22:28	2019-05-20 19:22:28
71	3	2019-05-20	2	2019-05-20 21:50:06	2019-05-20 21:50:11
72	1	2019-05-20	1	2019-05-21 01:37:20	2019-05-21 01:37:20
74	3	2019-05-21	2	2019-05-21 20:20:23	2019-05-21 20:20:23
75	4	2019-05-21	2	2019-05-22 01:25:55	2019-05-22 01:25:55
76	2	2019-05-21	1	2019-05-22 01:26:18	2019-05-22 01:26:18
77	4	2019-05-22	1	2019-05-22 19:34:58	2019-05-22 19:34:58
78	3	2019-05-22	1	2019-05-22 19:35:32	2019-05-22 19:35:32
79	4	2019-05-23	2	2019-05-23 22:23:52	2019-05-23 22:23:52
94	1	2019-05-27	2	2019-05-27 20:28:17	2019-05-27 20:28:17
70	2	2019-05-20	1	2019-05-20 21:49:43	2019-05-24 23:19:35
80	2	2019-05-22	2	2019-05-24 23:19:12	2019-05-24 23:19:41
81	2	2019-05-23	1	2019-05-24 23:19:44	2019-05-24 23:19:44
83	4	2019-05-24	2	2019-05-24 23:28:33	2019-05-24 23:28:33
84	3	2019-05-24	1	2019-05-24 23:29:03	2019-05-24 23:29:03
85	3	2019-05-25	2	2019-05-26 00:29:17	2019-05-26 00:29:17
86	4	2019-05-25	2	2019-05-26 00:29:41	2019-05-26 00:29:41
95	3	2019-05-27	2	2019-05-27 20:29:00	2019-05-27 20:29:19
96	4	2019-05-27	2	2019-05-27 20:29:53	2019-05-27 20:29:53
97	3	2019-05-28	1	2019-05-28 12:54:25	2019-05-28 12:54:25
98	4	2019-05-28	2	2019-05-29 10:40:48	2019-05-29 10:40:48
100	1	2019-05-30	2	2019-05-31 19:21:02	2019-05-31 19:21:02
101	1	2019-05-29	2	2019-05-31 19:21:03	2019-05-31 19:21:03
99	1	2019-05-28	2	2019-05-31 19:19:18	2019-05-31 19:21:05
82	2	2019-05-24	2	2019-05-24 23:19:47	2019-06-04 00:34:24
102	2	2019-05-25	2	2019-06-04 00:33:26	2019-06-04 00:35:02
103	2	2019-05-26	1	2019-06-04 00:35:10	2019-06-04 00:35:10
104	2	2019-05-27	1	2019-06-04 00:35:12	2019-06-04 00:35:12
105	2	2019-05-28	1	2019-06-04 00:35:13	2019-06-04 00:35:13
106	2	2019-05-29	1	2019-06-04 00:35:14	2019-06-04 00:35:14
107	2	2019-05-30	1	2019-06-04 00:35:16	2019-06-04 00:35:16
109	1	2019-06-09	1	2019-06-10 23:54:52	2019-06-10 23:54:52
108	1	2019-06-08	0	2019-06-10 23:54:43	2019-06-14 19:33:56
110	1	2019-06-10	1	2019-06-10 23:54:54	2019-06-10 23:54:54
111	5	2019-06-09	1	2019-06-13 00:00:16	2019-06-13 00:00:16
112	5	2019-06-10	1	2019-06-13 00:00:20	2019-06-13 00:00:20
113	5	2019-06-11	1	2019-06-13 00:00:23	2019-06-13 00:00:23
115	5	2019-06-13	2	2019-06-13 00:01:10	2019-06-13 00:01:10
116	5	2019-06-17	0	2019-06-13 00:01:16	2019-06-13 00:01:16
117	3	2019-06-10	1	2019-06-13 19:14:18	2019-06-13 19:14:18
118	3	2019-06-11	2	2019-06-13 19:14:23	2019-06-13 19:14:23
135	4	2019-06-14	2	2019-06-15 14:03:03	2019-06-15 14:03:03
114	5	2019-06-12	1	2019-06-13 00:00:54	2019-06-14 12:24:46
119	3	2019-06-12	4	2019-06-13 19:14:26	2019-06-13 19:15:07
121	5	2019-06-14	2	2019-06-14 12:25:05	2019-06-14 12:25:05
122	4	2019-06-01	0	2019-06-14 13:00:12	2019-06-14 13:00:12
123	4	2019-06-13	1	2019-06-14 13:00:20	2019-06-14 13:00:20
120	3	2019-06-13	1	2019-06-13 19:14:28	2019-06-14 13:01:24
124	1	2019-06-11	1	2019-06-14 19:25:21	2019-06-14 19:25:21
126	1	2019-06-13	1	2019-06-14 19:25:26	2019-06-14 19:25:26
127	1	2019-06-14	1	2019-06-14 19:25:27	2019-06-14 19:25:27
125	1	2019-06-12	0	2019-06-14 19:25:23	2019-06-14 19:25:32
128	2	2019-06-09	1	2019-06-14 22:32:47	2019-06-14 22:32:47
129	2	2019-06-10	1	2019-06-14 22:32:49	2019-06-14 22:32:49
130	2	2019-06-11	1	2019-06-14 22:32:50	2019-06-14 22:32:50
131	2	2019-06-12	1	2019-06-14 22:32:51	2019-06-14 22:32:51
132	2	2019-06-13	2	2019-06-14 22:32:52	2019-06-14 22:32:52
134	2	2019-06-15	0	2019-06-14 22:32:56	2019-06-14 22:32:56
133	2	2019-06-14	3	2019-06-14 22:32:55	2019-06-14 22:32:58
136	3	2019-06-14	2	2019-06-15 14:03:38	2019-06-15 14:03:38
137	1	2019-06-15	4	2019-06-16 08:09:14	2019-06-16 08:09:14
138	4	2019-06-15	2	2019-06-16 13:19:22	2019-06-16 13:19:22
139	3	2019-06-15	2	2019-06-16 13:19:58	2019-06-16 13:19:58
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: zwuvvxdaawwgfs
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_roles_table	1
2	2014_10_12_000000_create_users_table	1
3	2014_10_12_100000_create_password_resets_table	1
4	2019_05_04_063422_create_meals_table	1
5	2019_05_04_071107_create_bazars_table	1
6	2019_05_05_235125_create_debitcredits_table	1
7	2018_08_08_100000_create_telescope_entries_table	2
8	2019_05_26_161122_create_user_months_table	2
\.


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: zwuvvxdaawwgfs
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: zwuvvxdaawwgfs
--

COPY public.roles (id, name, slug, deleted_at, created_at, updated_at) FROM stdin;
1	admin	admin	\N	2019-05-06 23:51:47	2019-05-06 23:51:47
2	moderator	moderator	\N	2019-05-06 23:51:47	2019-05-06 23:51:47
3	member	member	\N	2019-05-06 23:51:47	2019-05-06 23:51:47
\.


--
-- Data for Name: telescope_entries; Type: TABLE DATA; Schema: public; Owner: zwuvvxdaawwgfs
--

COPY public.telescope_entries (sequence, uuid, batch_id, family_hash, should_display_on_index, type, content, created_at) FROM stdin;
9396	8df130fe-b8cd-45ff-86b8-f70fe2f5a863	8df130fe-be5c-4caa-abfb-2d44a889a87b	\N	t	query	{"connection":"pgsql","bindings":[],"sql":"delete from \\"telescope_entries\\"","time":"288.41","slow":true,"file":"\\/app\\/artisan","line":37,"hostname":"058a7b78-c6f7-4e1e-a95d-d70dd31b4076"}	2019-06-16 13:34:46
9397	8df130fe-be03-4aca-971d-2a89f894c3be	8df130fe-be5c-4caa-abfb-2d44a889a87b	\N	t	query	{"connection":"pgsql","bindings":[],"sql":"delete from \\"telescope_monitoring\\"","time":"3.49","slow":false,"file":"\\/app\\/artisan","line":37,"hostname":"058a7b78-c6f7-4e1e-a95d-d70dd31b4076"}	2019-06-16 13:34:46
9398	8df130fe-be45-4c3b-9e00-92e18fbcc034	8df130fe-be5c-4caa-abfb-2d44a889a87b	\N	t	command	{"command":"telescope:clear","exit_code":0,"arguments":{"command":"telescope:clear"},"options":{"help":false,"quiet":false,"verbose":false,"version":false,"ansi":false,"no-ansi":false,"no-interaction":false,"env":null},"hostname":"058a7b78-c6f7-4e1e-a95d-d70dd31b4076"}	2019-06-16 13:34:46
\.


--
-- Data for Name: telescope_entries_tags; Type: TABLE DATA; Schema: public; Owner: zwuvvxdaawwgfs
--

COPY public.telescope_entries_tags (entry_uuid, tag) FROM stdin;
8df130fe-b8cd-45ff-86b8-f70fe2f5a863	slow
\.


--
-- Data for Name: telescope_monitoring; Type: TABLE DATA; Schema: public; Owner: zwuvvxdaawwgfs
--

COPY public.telescope_monitoring (tag) FROM stdin;
\.


--
-- Data for Name: user_months; Type: TABLE DATA; Schema: public; Owner: zwuvvxdaawwgfs
--

COPY public.user_months (id, year_month, user_ids, created_at, updated_at) FROM stdin;
2	2019-05-01	[2,3,4,1]	2019-06-10 23:43:15	2019-06-10 23:43:15
1	2019-06-01	["2","3","4","1","5"]	2019-06-10 23:43:07	2019-06-10 23:45:01
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: zwuvvxdaawwgfs
--

COPY public.users (id, name, display_name, slug, role_id, email, provider, provider_id, others, email_verified_at, password, enable, address, city, postal_code, mobile, voter_id_no, passport_no, date_of_birth, remember_token, deleted_at, created_at, updated_at) FROM stdin;
3	Tuhin	Tuhin	tuhin	2	tuhin@gmail.com	\N	\N	\N	\N	$2y$10$a8meol/2JFd2pH93o50z9.oYsGyO/mGCJh88xZCoujn23/Cik7ra2	t	\N	\N	\N	\N	\N	\N	\N	NA3VoySoZHjJo1UmrJ9Y7cdtp6nT01ptfYbIm5AP8iJ9jfZ9CIu4K7oZnCVu	\N	2019-05-06 23:51:47	2019-05-06 23:51:47
4	Rasel	Rasel	rasel	2	rasel@gmail.com	\N	\N	\N	\N	$2y$10$FtU3wi2ykiHlGHPOLOJyw.vShHqo7lX//RmmXpPBfhJ0INJFMjGoq	t	\N	\N	\N	\N	\N	\N	\N	L6xcjWujLkRHGnFtUDNsSTKD9OIMwjBVaKsAfPgYw3GhidkFKshEBSUJJrdG	\N	2019-05-06 23:51:47	2019-05-06 23:51:47
5	Palash	\N	palash	3	palash@gmail.com	\N	\N	\N	\N	$2y$10$evcFyTeFAJ4ja6/sZYQSmuSzN2VMHPoToY.Io0VQd6N23EnfQU6t6	t	\N	\N	\N	\N	\N	\N	\N	\N	\N	2019-06-10 23:44:15	2019-06-10 23:47:34
1	Shibu	Shibu	shibu	1	polo@gmail.com	\N	\N	\N	\N	$2y$10$oVCH0IA4Bk1VXCIyDxfxIO7hU4JdReiN1xWx..mweP8UALQ7hHuT6	t	\N	\N	\N	\N	\N	\N	\N	b6qDZLWGHZmneQhaKuGGYEkgePgQ3H8ePVUzCSSwIpL3wIYHSsg1kw1u7lRe	\N	2019-05-06 23:51:47	2019-05-06 23:51:47
2	Arif	Arif	arif	2	arif@gmail.com	\N	\N	\N	\N	$2y$10$advnlDXDgtcSREyBRzMxhe/cgpHfLQAWzFWAeOjeLHyb1DnU5JoCi	t	\N	\N	\N	\N	\N	\N	\N	aR0uAUovEpWVC09aoyQVixAsce7qUqBr0wmrbVvpdG500OkP0GrELbUamw8e	\N	2019-05-06 23:51:47	2019-05-06 23:51:47
\.


--
-- Name: bazars_id_seq; Type: SEQUENCE SET; Schema: public; Owner: zwuvvxdaawwgfs
--

SELECT pg_catalog.setval('public.bazars_id_seq', 54, true);


--
-- Name: debitcredits_id_seq; Type: SEQUENCE SET; Schema: public; Owner: zwuvvxdaawwgfs
--

SELECT pg_catalog.setval('public.debitcredits_id_seq', 10, true);


--
-- Name: meals_id_seq; Type: SEQUENCE SET; Schema: public; Owner: zwuvvxdaawwgfs
--

SELECT pg_catalog.setval('public.meals_id_seq', 139, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: zwuvvxdaawwgfs
--

SELECT pg_catalog.setval('public.migrations_id_seq', 8, true);


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: zwuvvxdaawwgfs
--

SELECT pg_catalog.setval('public.roles_id_seq', 1, false);


--
-- Name: telescope_entries_sequence_seq; Type: SEQUENCE SET; Schema: public; Owner: zwuvvxdaawwgfs
--

SELECT pg_catalog.setval('public.telescope_entries_sequence_seq', 9398, true);


--
-- Name: user_months_id_seq; Type: SEQUENCE SET; Schema: public; Owner: zwuvvxdaawwgfs
--

SELECT pg_catalog.setval('public.user_months_id_seq', 2, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: zwuvvxdaawwgfs
--

SELECT pg_catalog.setval('public.users_id_seq', 5, true);


--
-- Name: bazars bazars_pkey; Type: CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.bazars
    ADD CONSTRAINT bazars_pkey PRIMARY KEY (id);


--
-- Name: debitcredits debitcredits_pkey; Type: CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.debitcredits
    ADD CONSTRAINT debitcredits_pkey PRIMARY KEY (id);


--
-- Name: meals meals_pkey; Type: CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.meals
    ADD CONSTRAINT meals_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- Name: telescope_entries telescope_entries_pkey; Type: CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.telescope_entries
    ADD CONSTRAINT telescope_entries_pkey PRIMARY KEY (sequence);


--
-- Name: telescope_entries telescope_entries_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.telescope_entries
    ADD CONSTRAINT telescope_entries_uuid_unique UNIQUE (uuid);


--
-- Name: user_months user_months_pkey; Type: CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.user_months
    ADD CONSTRAINT user_months_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users users_slug_unique; Type: CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_slug_unique UNIQUE (slug);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: telescope_entries_batch_id_index; Type: INDEX; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE INDEX telescope_entries_batch_id_index ON public.telescope_entries USING btree (batch_id);


--
-- Name: telescope_entries_family_hash_index; Type: INDEX; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE INDEX telescope_entries_family_hash_index ON public.telescope_entries USING btree (family_hash);


--
-- Name: telescope_entries_tags_entry_uuid_tag_index; Type: INDEX; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE INDEX telescope_entries_tags_entry_uuid_tag_index ON public.telescope_entries_tags USING btree (entry_uuid, tag);


--
-- Name: telescope_entries_tags_tag_index; Type: INDEX; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE INDEX telescope_entries_tags_tag_index ON public.telescope_entries_tags USING btree (tag);


--
-- Name: telescope_entries_type_should_display_on_index_index; Type: INDEX; Schema: public; Owner: zwuvvxdaawwgfs
--

CREATE INDEX telescope_entries_type_should_display_on_index_index ON public.telescope_entries USING btree (type, should_display_on_index);


--
-- Name: debitcredits debitcredits_credit_to_foreign; Type: FK CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.debitcredits
    ADD CONSTRAINT debitcredits_credit_to_foreign FOREIGN KEY (credit_to) REFERENCES public.users(id);


--
-- Name: debitcredits debitcredits_debit_to_foreign; Type: FK CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.debitcredits
    ADD CONSTRAINT debitcredits_debit_to_foreign FOREIGN KEY (debit_to) REFERENCES public.users(id);


--
-- Name: meals meals_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.meals
    ADD CONSTRAINT meals_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: telescope_entries_tags telescope_entries_tags_entry_uuid_foreign; Type: FK CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.telescope_entries_tags
    ADD CONSTRAINT telescope_entries_tags_entry_uuid_foreign FOREIGN KEY (entry_uuid) REFERENCES public.telescope_entries(uuid) ON DELETE CASCADE;


--
-- Name: users users_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: zwuvvxdaawwgfs
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: zwuvvxdaawwgfs
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO zwuvvxdaawwgfs;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: LANGUAGE plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO zwuvvxdaawwgfs;


--
-- PostgreSQL database dump complete
--

